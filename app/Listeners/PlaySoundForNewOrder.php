<?php

namespace App\Listeners;

use App\Events\NewOrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PlaySoundForNewOrder
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
    public function handle(NewOrderCreated $event): void
    {
         // Emitir um evento para o cliente usando WebSockets (por exemplo, Pusher)
         Broadcast::event('new-order-created', ['order_id' => $event->order->id]);
    }
}
