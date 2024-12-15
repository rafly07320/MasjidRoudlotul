<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Schedule::call(function () {
//     Mail::to('ridhoikhsandria348@gmail.com')->send(new \App\Mail\TaskSchedulerMail([]));
// })->everyMinute();

Schedule::call(function () {
    $emails = DB::table('shodaqohs')->pluck('email_shodaqoh');
    foreach ($emails as $email) {
        Mail::to($email)->send(new \App\Mail\PostCountMail());
    }
})->dailyAt('19:47');