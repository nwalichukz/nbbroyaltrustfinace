<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAdminToken extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $token, $email;
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        {
            $subject = 'Abolle Admin Token';
            $address = 'support@abolle.com';
            $name = 'Abolle';
            return $this->view('email.send-admin-token')
                        ->subject($subject)
                        ->from($address, $name);
        }
    }
}
