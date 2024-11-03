<?php

namespace App\Http\Controllers\web;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index(){
     $products=Product::with("images")->get();
        return view("web.index",compact('products'));
    }
}
