<?php

namespace App\Listeners;

use App\Events\CommentWritten;
use App\Models\Achievement;
use App\Models\Comment;
use App\Providers\AchievementUnlocked;
use App\Repositories\CommentRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class CommentWrittenListener
{
    public $comment;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
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

        $commentStored = $this->comment->store($comment);

        if ($commentStored) {
            event (new AchievementUnlocked(new Achievement()));
        }
    }
}
