<?php

namespace App\Events;

use App\Models\SkpRealisasi;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SkpRealisasiUpdating
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $skp_realisasi;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SkpRealisasi $skp_realisasi)
    {
        $this->skp_realisasi = $skp_realisasi;
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
