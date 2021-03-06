<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function as_pegawai() {
        return $this->hasOne(Pegawai::class, 'id_user');
    }

    public function is_admin() {
        $admins = config('auth.admins');
        return in_array($this->name, $admins);
    }

    public static function get_admins() {
        $admins = config('auth.admins');

        return User::all()
                    ->filter(function ($user) use ($admins) {
                        return in_array($user->name, $admins);
                    });
    }
}
