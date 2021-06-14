<?php

namespace App\Providers;

use App\Models\SkpRealisasi;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define(
            'download-bukti-skp-realisasi',
            function (User $user, SkpRealisasi $skp_realisasi) {
                $id_pegawai_user = $user->as_pegawai()->first()->id;
                $id_pegawai_skp = $skp_realisasi->skp_target()->first()->id_pegawai;

                return $id_pegawai_user === $id_pegawai_skp;
            }
        );
    }
}
