<?php

namespace App\Models;

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

    public function skp_target() {
        return $this->belongsTo(SkpTarget::class, 'id_skp_target');
    }
}
