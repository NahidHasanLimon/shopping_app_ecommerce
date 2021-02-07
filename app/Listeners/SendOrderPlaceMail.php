<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
class SendOrderPlaceMail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        $order = $event->order->toArray();
        // Mail::send('emails.order.placed', $order, function($message) use ($order) {
        //          $message->to('drimik2010@gmail.com', 'Customer')
        //          ->subject('Order Placed');
        //       });
        for ($i=0; $i <5 ; $i++) { 
           Mail::send('emails.order.placed', compact('order'), function($message) use ($order) {
            $message->to('drimik2010@gmail.com');
            $message->subject('Event Testing');
        });
        }
    }
}
