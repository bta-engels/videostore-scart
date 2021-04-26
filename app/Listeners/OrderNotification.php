<?php

namespace App\Listeners;

use App\Events\MovieOrdered;
use App\Mail\MovieOrderShipped;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class OrderNotification
{
    /**
     * Handle the event.
     *
     * @param  MovieOrdered  $event
     * @return void
     */
    public function handle( MovieOrdered $event )
    {
        // @TODO: email notification for customer and shop owner
        Mail::to($event->order->customer->email)
            ->send(new OrderShipped($event->order))
        ;
    }
}
