<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
class SendOrderPlaceMail
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
        // dd("Listener Handle Function");
         $limon = "l";
      $data = array('name'=>"Nahid Hasan Limon 2");
      // Mail::to('nh.limon2010@gmail.com')->send('emails.order.placed', $limon);
      Mail::send(
        ['text'=>'emails.order.placed'], 
        $data, 
        function($message) {
         $message->to('drimik2010@gmail.com', 'Limon Learning')->subject
            ('Laravel Basic Testing Mail');
         $message->from('nh.limon2010@gmail.com','Nahid Hasan Limon 22');
      }
    );
        // Mail::to("nh.limon2010@gmail.com")->send('emails.order.placed', $event->order);
    }
}
