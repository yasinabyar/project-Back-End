<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['barcode', 'name', 'description', 'image_path'];

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
