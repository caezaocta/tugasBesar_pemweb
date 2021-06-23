<?php

namespace App\Providers;

use App\Events\SkpRealisasiUpdating;
use App\Events\SkpTargetCreated;
use App\Listeners\CheckSkpRealisasiIsCompleted;
use App\Listeners\CreateSkpRealisasi;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        SkpRealisasiUpdating::class => [
            CheckSkpRealisasiIsCompleted::class
        ],

        SkpTargetCreated::class => [
            CreateSkpRealisasi::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
