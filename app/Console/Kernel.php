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
        $schedule->command('inspire')
                 ->hourly()
                ->everyTenMinutes()
                ->days(Schedule::TUESDAY);
        $schedule->job(new ProcessPodcast())
                 ->weekdays()
                 ->hourly()
                 ->days(Schedule::SATURDAY)
                 ->twiceMonthly(13, 15, '22:32')
                 ->everyThreeHours();
        $schedule->job(new ProcessPodcast())->cron('15 10,13,14,16,22,23 * * 1,4');
        $date = date("H:i:s");
        $schedule->exec("echo '' >> cron/schedule-$date.txt")
                 ->description('Create file');
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
