<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkpTarget extends Model
{
    use HasFactory;
  
    protected $fillable = ['jml_target', 'id_pegawai', 'id_periode', 'id_uraian_pekerjaan_jabatan', 'created_by', 'updated_by'];

    protected $table = 'skp_target';

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => SkpTargetCreated::class,
    ];

    public function get_date_created() {
        $created_at = $this->created_at;
        $date = explode(' ', $created_at)[0];
        return $date;
    }

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
