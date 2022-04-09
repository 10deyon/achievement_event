<?php

namespace App\Providers;

use App\Providers\AchievementUnlocked;
use App\Repositories\CommentRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AchievementUnlockedListener
{
    public $achievement;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CommentRepository $achievement)
    {
        $this->achievement = $achievement;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\AchievementUnlocked  $event
     * @return void
     */
    public function handle(AchievementUnlocked $event)
    {
        $achievement = $event->achievement;

        $this->achievement->storeAchievement($achievement);
    }
}
