<?php

namespace App\Mail;

use App\Devoir;
use App\Rendu;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EtudiantRenduDevoirMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $rendu;

    /**
     * Create a new message instance.
     *
     * @param Rendu $rendu
     */
    public function __construct(Rendu $rendu)
    {
        $this->rendu = $rendu;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('picardie@demo.com')->markdown('emails.etudiant.devoir_rendu', [
            'rendu' => $this->rendu
        ]);
    }
}
