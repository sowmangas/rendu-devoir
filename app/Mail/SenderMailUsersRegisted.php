<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SenderMailUsersRegisted extends Mailable
{
    protected $random;
    protected $user;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param string $random
     * @param User $user
     */
    public function __construct(string $random, User $user)
    {
        $this->random = $random;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.sender', ['random' => $this->random, 'user' => $this->user]);
    }
}
