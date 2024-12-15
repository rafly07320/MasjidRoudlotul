<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // Tambahkan baris ini
    protected $commands = [
        \App\Console\Commands\SendScheduledEmail::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:send')
            ->everyMinute()
            ->timezone('Asia/Jakarta');
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
    }
}
