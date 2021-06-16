<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefUnit extends Model
{

    public function parentUnit()
    {
        return $this->belongsTo(RefUnit::class, 'id_unit_parent');
    }

    public function getStatus()
    {
        return $this->is_active == 1? 'Aktif':'Tidak Aktif';
    }

    use HasFactory;

    protected $fillable = ['nama', 'level', 'is_active', 'id_unit_parent', 'created_by', 'updated_by'];
}
