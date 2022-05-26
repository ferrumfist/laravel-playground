<?php

namespace App\Console;

use App\Jobs\ProcessPodcast;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')->hourly();
        $schedule->job(new ProcessPodcast())
                 ->weekdays()
                 ->hourly()
                 ->timezone('America/Chicago')
                 ->between('8:00', '17:00');
        $schedule->exec('node /home/forge/script.js');
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
