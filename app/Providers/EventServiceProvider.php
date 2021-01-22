<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\OrderPlaced;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\SendOrderPlaceMail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderPlaced::class => [
            SendOrderPlaceMail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
