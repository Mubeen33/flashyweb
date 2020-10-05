<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDynamicEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $firstName;
    public $lastName;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstName, $lastName, $subject)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailSendNow = $this->subject($this->subject)->view('email-templates.dynamic-template')
        ->with([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'subject' => $this->subject,
        ]);
        return $emailSendNow;
    }
}
