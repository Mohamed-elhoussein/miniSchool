<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillabl=["user_id","product_id","count"];

    public function products()
    {
        return $this->hasMany(Product::class,"id","product_id");
    }
}
