<?php

namespace App\Mail;

use App\Rendu;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProfCorrectionDevoirMail extends Mailable
{
    protected $rendu;
    protected $user;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Rendu $rendu
     */
    public function __construct(User $user, Rendu $rendu)
    {
        $this->rendu = $rendu;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('picardie@demo.com')->markdown('emails.prof.corrige_devoir', [
            'rendu' => $this->rendu,
            'etudiant' => $this->user,
        ]);
    }
}
