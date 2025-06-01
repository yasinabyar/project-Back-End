<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function store(Request $request, $productId)
    {
        // بررسی وجود کالا
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'کالا یافت نشد.'], 404);
        }

        // بررسی اینکه آیا قبلاً تحویل داده شده؟
        if ($product->delivery) {
            return response()->json(['message' => 'این کالا قبلاً تحویل داده شده است.'], 400);
        }

        // ثبت تحویل
        $delivery = Delivery::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'delivered_at' => now(),
        ]);

        return response()->json([
            'message' => 'تحویل کالا با موفقیت ثبت شد.',
            'delivery' => $delivery
        ]);
    }
}
