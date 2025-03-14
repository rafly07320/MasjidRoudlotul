<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();



Schedule::call(function () {
    $emails = DB::table('shodaqohs')->pluck('email_shodaqoh');
    foreach ($emails as $email) {
        Mail::to($email)->send(new \App\Mail\PostCountMail());
    }
})->dailyAt('18:40'); //setiap hari sekali
// ->monthlyOn(15,'19:47'); // setiap 1 bulan sekali dgn tgl tertentu