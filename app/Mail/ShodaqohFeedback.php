<?php

namespace App\Mail;

use App\Models\Shodaqoh;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShodaqohFeedback extends Mailable
{
    use Queueable, SerializesModels;

    public $shodaqoh;

    public function __construct(Shodaqoh $shodaqoh)
    {
        $this->shodaqoh = $shodaqoh;
    }

    public function build()
    {
        return $this->subject('Terima Kasih atas Shodaqoh Anda')
                    ->view('admin.shodaqoh.shodaqoh_feedback');
    }
}
