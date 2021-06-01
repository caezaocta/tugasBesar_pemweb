<?php

namespace App\Listeners;

use App\Events\SkpTargetCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateSkpRealisasi
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
     * @param  SkpTargetCreated  $event
     * @return void
     */
    public function handle(SkpTargetCreated $event)
    {
        //
    }
}
