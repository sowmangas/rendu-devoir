<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemoSendMailController extends Controller
{
    public function send(Request $request, $orderId)
    {

        $order = User::findOrFail($orderId);

        Mail::to(User::first()->adresse_mel)->send(new OrderShipped($order));
    }
}
