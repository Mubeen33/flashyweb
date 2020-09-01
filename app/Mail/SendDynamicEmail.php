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
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstName, $lastName, $template)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->data = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailSendNow = $this->subject($this->data->subject_line)->view('email-templates.dynamic-template')
        ->with([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'data' => $this->data,
        ]);
        return $emailSendNow;
    }
}
