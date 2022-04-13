<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\CommentWritten;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class CommentWrittenListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CommentWritten $event)
    {
        $comment = $event->comment;
        $user = User::find($comment->user_id);

        DB::table('achievement_user')->insertGetId([
            'user_id' => $user->id, 
            'achievement_id' => $comment->id,
            'status' => true,
            'type' => 'comment'
        ]);
        event( new AchievementUnlocked($comment, $user) );
    }
}
