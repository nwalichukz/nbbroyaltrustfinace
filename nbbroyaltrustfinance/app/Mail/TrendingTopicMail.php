<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrendingTopicMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email, $post;
    public function __construct($email, $post){
    $this->email = $email;
    $this->post = $post;
    
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {    $subject = 'Hello check out these trending posts';
        $address = 'support@abolle.com';
        $name = 'Abolle';
        return $this->view('email.send-trending-topics')
                   ->subject($subject)
                   ->from($address, $name);
    }
}
