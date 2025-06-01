<?php

namespace App\Observers;

use App\Models\Delivery;
use Illuminate\Support\Facades\Log;


class DeliveryObserver
{
    /**
     * Handle the Delivery "created" event.
     */
    public function create(Delivery $delivery)
    {
        Log::info("کالا توسط کاربر {$delivery->user_id} تحویل داده شد (Product ID: {$delivery->product_id})");
    }

    /**
     * Handle the Delivery "updated" event.
     */
    public function updated(Delivery $delivery): void
    {
        //
    }

    /**
     * Handle the Delivery "deleted" event.
     */
    public function deleted(Delivery $delivery): void
    {
        //
    }

    /**
     * Handle the Delivery "restored" event.
     */
    public function restored(Delivery $delivery): void
    {
        //
    }

    /**
     * Handle the Delivery "force deleted" event.
     */
    public function forceDeleted(Delivery $delivery): void
    {
        //
    }
}
