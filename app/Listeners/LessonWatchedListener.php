<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\LessonWatched;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LessonWatchedListener
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
    public function handle(LessonWatched $event)
    {
        $lesson = $event->lesson;
        $user = $event->user;
        
        $user->watched()->attach($lesson->id, ['watched' => true]);

        DB::table('achievement_user')->insertGetId([
            'user_id' => $user->id, 
            'achievement_id' => $lesson->id,
            'status' => true,
            'type' => 'lesson'
        ]);

        event( new AchievementUnlocked($lesson, $user) );
    }
}
