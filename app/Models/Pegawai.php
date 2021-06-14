<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'kode_pegawai',
        'alamat',
        'id_user',
        'id_unit',
        'id_jabatan',
        'is_active',
        'created_by',
        'updated_by',
    ];

    public function unit() {
        return $this->belongsTo(RefUnit::class, 'id_unit');
    }

    public function jabatan() {
        return $this->belongsTo(RefJabatan::class, 'id_jabatan');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor() {
        return $this->belongsTo(User::class, 'edited_by');
    }
}
