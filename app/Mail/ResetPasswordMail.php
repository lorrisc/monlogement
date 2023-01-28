<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $email;

    public function __construct($email,$token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    public function build()
    {
        return $this->view('emails.reset-password')
            ->subject('Réinitialisation de votre mot de passe')
            ->with(['email' => $this->email])
            ->with(['token' => $this->token]);
    }
}
