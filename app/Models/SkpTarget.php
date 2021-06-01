<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkpTarget extends Model
{
    use HasFactory;

    protected $table = 'skp_target';

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function periode() {
        return $this->belongsTo(Periode::class, 'id_periode');
    }

    public function uraian_pekerjaan_jabatan() {
        return $this->belongsTo(UraianPekerjaanJabatan::class, 'id_uraian_pekerjaan_jabatan');
    }

    public function realisasi() {
        return $this->hasOne(SkpRealisasi::class, 'id_skp_target');
    }
}
