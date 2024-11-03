<?php

namespace App\Http\Controllers\web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDetailsController extends Controller
{
 public function Details($id)
 {
    // return $id;
   $product= Product::where("id",$id)->with("images")->get()[0];
   return view('web.product-details',compact('product'));

 }
}
