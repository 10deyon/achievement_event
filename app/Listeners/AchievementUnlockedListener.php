<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\BadgeUnlocked;
use App\Models\Badge;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AchievementUnlockedListener
{
    const FIRST_LEVEL = 5;
    const SECOND_LEVEL = 10;
    const THIRD_LEVEL = 15;
    const FOURTH_LEVEL = 20;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function handle(AchievementUnlocked $event)
    {
        $comment = $event->comment;
        $user = $event->user;
        
        $achievement_num = DB::table('achievement_user')->where('user_id', $user->id)->count();

        if ($achievement_num === self::FIRST_LEVEL) {
            $badgeId = 1;
            $this->badgeUnlocked($user, $badgeId);}

        if ($achievement_num === self::SECOND_LEVEL) {
            $badgeId = 2;
            $this->badgeUnlocked($user, $badgeId);
        }

        if ($achievement_num === self::THIRD_LEVEL) {
            $badgeId = 3;
            $this->badgeUnlocked($user, $badgeId);
        }

        if ($achievement_num === self::FOURTH_LEVEL) {
            $badgeId = 4; 
            $this->badgeUnlocked($user, $badgeId);
        }
    }

    public function badgeUnlocked($user, $badgeId)
    {
        $badge = Badge::find($badgeId);
        event( new BadgeUnlocked($badge, $user) );
    }
}
