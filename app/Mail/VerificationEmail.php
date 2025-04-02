<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function build()
    {
        return $this->subject('Your Account Verification Code')
                    ->view('emails.verification')
                    ->with([
                        'otp' => $this->otp,
                        'expires_at' => now()->addMinutes(15)->format('g:i A T')
                    ]);
    }
}