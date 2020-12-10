<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Apartment;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $apartment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Apartment $apartment)
    {
        $this->apartment = $apartment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newapartment')->subject('Creazione Nuovo Appartamento');
    }
}
