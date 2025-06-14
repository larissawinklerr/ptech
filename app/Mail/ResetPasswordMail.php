<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $actionUrl;

    public function __construct($actionUrl)
    {
        $this->actionUrl = $actionUrl;
    }

    public function build()
    {
        return $this->subject('Recuperação de Senha')
                    ->view('emails.reset-password');
    }
} 