<?php

namespace App\Models;


use App\Models\User;
use App\Models\image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable=["name","price","sale","count","category"];
    public function images(){
        return  $this->hasMany(image::class,"product_id","id");
    }

    public function carts()
    {
        $_this->belongsToMany(User::class,"carts");
    }
}