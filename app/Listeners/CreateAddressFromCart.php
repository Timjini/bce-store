<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Models\Address;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateAddressFromCart
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
    public function handle(OrderPlaced $event): void
    {
        info('Creating address for order ID: ' . json_encode($event->data));

        $shipping = $event->data['shipping'];
        $billing = $event->data['billing'];

        // Shipping address
        Address::create([
            'order_id' => $event->order->id,
            'type' => 'shipping',
            'address_line1' => $shipping['address'],
            'address_line2' => $shipping['address2'] ?? null,
            'city' => $shipping['city'],
            'state' => $shipping['state'],
            'zip' => $shipping['zip'],
            'country' => $shipping['country'],
            'contact_name' => $shipping['contact_name'] ?? null,
            'contact_phone' => $shipping['contact_phone'] ?? null,
        ]);


        Address::create([
            'order_id' => $event->order->id,
            'type' => 'billing',
            'address_line1' => $billing['address'],
            'address_line2' => $billing['address2'] ?? null,
            'city' => $billing['city'],
            'state' => $billing['state'],
            'zip' => $billing['zip'],
            'country' => $billing['country'],
        ]);
    }
}
