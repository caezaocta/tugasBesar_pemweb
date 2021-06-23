<?php

namespace App\Console;

use App\Models\Periode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // membuat entry periode secara otomatis tiap tahunnya
        $schedule
            ->call(function () {
                $now = Carbon::now();
                $creator = User::get_admins()[0];

                Periode::create([
                    'nama' => "{$now->year} - Semester ganjil",
                    'tanggal_awal' => $now->addMonth(),
                    'tanggal_akhir' => $now->addMonths(6),
                    'created_by' => $creator,
                    'updated_by' => $creator
                ]);

                Periode::create([
                    'nama' => "{$now->year} - Semester genap",
                    'tanggal_awal' => $now,
                    'tanggal_akhir' => $now->addMonths(6),
                    'created_by' => $creator,
                    'updated_by' => $creator
                ]);
            })
            ->yearlyOn(7, 1, '00:00'); // 1 Juli
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
