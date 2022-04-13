<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\PrivateChannel;

class LessonWatched
{
    use Dispatchable, SerializesModels;

    public $lesson;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($lesson, $user)
    {
        $this->lesson = $lesson;
        $this->user = $user;
    }
    
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
