<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefUnit extends Model
{
    use HasFactory;

    public function childrenUnits() {
        return $this->hasMany(RefUnit::class, 'id_unit_parent');
    }

    public function parentUnit() {
        return $this->belongsTo(RefUnit::class, 'id_unit_parent');
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor() {
        return $this->belongsTo(User::class, 'edited_by');
    }
}
