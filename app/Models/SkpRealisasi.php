<?php

namespace App\Models;

use App\Events\SkpRealisasiUpdating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkpRealisasi extends Model
{
    use HasFactory;

    protected $table = 'skp_realisasi';

    protected $fillable = [
        'id_skp_target',
        'tanggal_awal',
        'tanggal_akhir',
        'lokasi',
        'jml_realisasi',
        'keterangan',
        'path_bukti',
        'created_by',
        'updated_by',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'updating' => SkpRealisasiUpdating::class,
    ];

    public function is_done() {
        return
            $this->lokasi
            && $this->jml_realisasi == $this->skp_target()->jml_target
            && $this->path_bukti;
    }

    public function skp_target() {
        return $this->belongsTo(SkpTarget::class, 'id_skp_target');
    }
}
