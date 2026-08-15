<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email, $title, $msg, $post_id, $post_title;
    public function __construct($email, $title, $msg, $post_id, $post_title)
    {  $this->email = $email;  
      $this->title = $title;
      $this->msg = $msg;
      $this->post_id = $post_id;
      $this->post_title = $post_title;
       
        
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //  $subject = 'DigitMoni - Debit Transaction Notification';
        $address = 'support@abolle.com';
        $name = 'Abolle';
        $title = $this->title;
        return $this->view('email.notify-email')
                    ->subject($title)
                    ->from($address, $name);
    }
}
