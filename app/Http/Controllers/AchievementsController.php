<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AchievementsController extends Controller
{
    public function index(User $user)
    {
        $unlocked_achvment = DB::table('achievement_user')->where('user_id', $user->id)->get();
        $comment_ids = $unlocked_achvment->where('type', 'comment')->pluck('achievement_id');
        $lesson_ids = $unlocked_achvment->where('type', 'lesson')->pluck('achievement_id');

        $next_avaibl_achvment = [];
        array_push($next_avaibl_achvment, DB::table('commentachvment')->whereNotIn('id', $comment_ids)->get());
        array_push($next_avaibl_achvment, DB::table('lessonachvment')->whereNotIn('id', $lesson_ids)->get());

        $current_badge = $user->badges()->latest()->first();

        $remaing_badge = Badge::where('level', '>', $current_badge->level)->get();
        $next_badge = count($remaing_badge) > 0 ? $remaing_badge[0] : null;

        return response()->json([
            'unlocked_achievements' => $unlocked_achvment,
            'next_available_achievements' => $next_avaibl_achvment,
            'current_badge' => $current_badge->name,
            'next_badge' => $next_badge->name,
            'remaing_to_unlock_next_badge' => $remaing_badge->count()
        ]);
    }
}
