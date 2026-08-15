<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GenericMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email, $title, $msg;
    public function __construct($email, $title, $msg)
    {  $this->email = $email;
      $this->title = $title;
      $this->msg = $msg;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      //  $subject = 'DigitMoni - Debit Transaction Notification';
        $address = 'contactmetrokapital@gmail.com';
        $name = 'MetroKapital';
        $title = $this->title;
        return $this->view('email.generic')
                    ->subject($title)
                    ->from($address, $name);
    }
}
