<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    private $E_email      = '';
    private $E_subject    = '';
    private $E_body       = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData)
    {
        $this->E_email    = $formData->email;
        $this->E_subject  = $formData->subject;
        $this->E_body     = $formData->message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['E_email']      = $this->E_email;
        $data['E_subject']    = $this->E_subject;
        $data['E_body']       = $this->E_body;
        return $this->view('email.contact', $data);
    }
}
