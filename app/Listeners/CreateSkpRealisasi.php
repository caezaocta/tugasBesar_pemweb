<?php

namespace App\Listeners;

use App\Events\SkpTargetCreated;
use App\Models\SkpRealisasi;
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
        SkpRealisasi::create([
            'id_skp_target' => $event->skp_target->id,
            'tanggal_awal' => $event->skp_target->get_date_created(),
            'tanggal_akhir' => null,
            'lokasi' => null,
            'jml_realisasi' => 0,
            'keterangan' => null,
            'path_bukti' => null,
            'created_by' => $event->skp_target->created_by,
            'updated_by' => $event->skp_target->updated_by,
        ]);
    }
}
