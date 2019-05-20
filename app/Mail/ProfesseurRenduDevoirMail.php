<?php

namespace App\Mail;

use App\Rendu;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProfesseurRenduDevoirMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $rendu;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @param Rendu $rendu
     * @param User $user
     */
    public function __construct(Rendu $rendu, User $user)
    {
        $this->rendu = $rendu;
        $this->user  = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('picardie@demo.com')->markdown('emails.prof.prof_rendu', [
            'rendu' => $this->rendu,
            'prof'  => $this->user,
        ]);
    }
}
