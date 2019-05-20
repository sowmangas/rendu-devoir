<?php

namespace App\Mail;

use App\Devoir;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $devoir;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @param Devoir $devoir
     * @param User $user
     */
    public function __construct(Devoir $devoir, User $user)
    {
        $this->devoir = $devoir;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('picardie@demo.com')
            ->markdown('emails.orders.shipped', [
            'devoir' => $this->devoir, 'user' => $this->user
        ]);
    }
}
