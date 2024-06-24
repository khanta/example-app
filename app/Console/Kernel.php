<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('mail:send-daily-tweet-count-mail')->dailyAt('11:00');
        // $schedule->command('inspire')->hourly();
        // 毎分
        //$schedule->command('sample-command')->everyMinute()->emailOutputTo('info@example.com');

        // 毎時
        //$schedule->command('sample-command')->hourly();

        // 毎時 8 分
        //$schedule->command('sample-command')->hourlyAt(8);

        // 毎日
        //$schedule->command('sample-command')->daily();

        // 毎日 13 時
        //$schedule->command('sample-command')->dailyAt('13:00');

        // 毎日 3:15 (cron 表記)
        //$schedule->command('sample-command')->cron('15 3 * * *');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
