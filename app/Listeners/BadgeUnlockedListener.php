<?php

namespace App\Providers;

use App\Providers\BadgeUnlocked;
use App\Repositories\CommentRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BadgeUnlockedListener
{
    public $badge;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CommentRepository $badge)
    {
        $this->badge = $badge;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\BadgeUnlocked  $event
     * @return void
     */
    public function handle(BadgeUnlocked $event)
    {
        $badge = $event->badge;

        $badgeSaved = $this->badge->storeBadge($badge);
    }
}
