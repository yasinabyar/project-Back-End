<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'barcode' => 'required|string|unique:products,barcode',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:720', // حجم حداکثر 720KB
        ], [
            'barcode.required' => 'بارکد الزامی است.',
            'barcode.unique' => 'این بارکد قبلاً ثبت شده است.',
            'image.max' => 'حجم تصویر نباید بیشتر از 720 کیلوبایت باشد.',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = Product::create([
            'barcode' => $request->barcode,
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return response()->json([
            'message' => 'کالا با موفقیت ثبت شد.',
            'product' => $product
        ]);
    }
}
