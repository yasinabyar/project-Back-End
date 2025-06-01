<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function create(Product $product): void
    {
        // بررسی اینکه بارکد فقط 13 رقم عددی باشه
        if (!preg_match('/^\d{13}$/', $product->barcode)) {
            throw ValidationException::withMessages([
                'barcode' => ['بارکد وارد شده معتبر نیست (باید دقیقاً 13 رقم عددی باشد).']
            ]);
        }
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
