<?php

namespace App\Listeners;

use App\Events\InfoCustomer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendInfoCustomer
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InfoCustomer $event): void
    {
        info('novo cliente', $event->customer->name);
    }
}
