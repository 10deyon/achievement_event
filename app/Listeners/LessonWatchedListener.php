<?php

namespace App\Listeners;

use App\Events\LessonWatched;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LessonWatchedListener
{
    public $lesson_watched;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(LessonWatched $lesson)
    {
        $this->lesson_watched = $lesson;
        // $this->user = $user;
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

        $lessonSaved = $this->scheduleShift->scheduleWorkerShift($lesson);
        
        
    }
}
