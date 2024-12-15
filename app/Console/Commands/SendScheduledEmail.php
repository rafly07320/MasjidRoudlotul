<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskSchedulerMail;
use Illuminate\Support\Facades\Log;

class SendScheduledEmail extends Command
{
    protected $signature = 'email:send';
    protected $description = 'Send a scheduled email';

    public function handle()
    {
        try {
            $details = [
                'title' => 'Scheduled Email',
                'body' => 'This is a scheduled email sent automatically.'
            ];

            Mail::to('ridhoikhsandria348@gmail.com')->send(new TaskSchedulerMail($details));

            Log::info('Scheduled email sent successfully');
            $this->info('Email sent successfully!');
            return 0;
        } catch (\Exception $e) {
            Log::error('Scheduled email error: ' . $e->getMessage());
            $this->error('Email sending failed: ' . $e->getMessage());
            return 1;
        }
    }
}
