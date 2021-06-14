<?php

namespace App\Listeners;

use App\Events\SkpRealisasiUpdating;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckSkpRealisasiIsCompleted
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
     * @param  SkpRealisasiUpdated  $event
     * @return void
     */
    public function handle(SkpRealisasiUpdating $event)
    {
        if ($event->skp_realisasi->is_done()) {
            $event->skp_realisasi->tanggal_akhir = Carbon::now();
        }
    }
}
