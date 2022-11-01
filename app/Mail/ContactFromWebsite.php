<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFromWebsite extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $email;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$message)
    {
        $this->name = $name;
        $this->email =$email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->subject('your subject')->view('emails.ContactFromWebsite')->with(
            [
                'username'=> $this->name,
                'usermessage'=>$this->message,
                'email' => $this->email,
            ]
        );
    }
}
