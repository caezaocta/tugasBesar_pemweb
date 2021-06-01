<?php

namespace App\Events;

use App\Models\SkpTarget;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SkpTargetCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $skp_target;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SkpTarget $skp_target)
    {
        $this->skp_target = $skp_target;
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
