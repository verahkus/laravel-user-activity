<?php

namespace Verahkus\UserActivity\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ActivityUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $request;
    public $writeActivity;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user,$request,$writeActivity)
    {
        $this->user = $user;
        $this->request = $request;
        $this->writeActivity= $writeActivity;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
