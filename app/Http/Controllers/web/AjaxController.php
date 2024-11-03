<?php

namespace App\Http\Controllers\web;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{

public function addCart(Request $request)
{
    $id_login=Auth::user()->id;
   $ItemFound=Cart::where(["user_id"=>$id_login,"product_id"=>$request->product_id])->first();
   if($ItemFound)
   {
    return $ItemFound->increment("count");
   }else{
    $cart=new Cart;
    $cart->user_id=$id_login;
    $cart->product_id=$request->product_id;
    $cart->save();
    return $cart;
   }
   
}

public function destroy(Request $request)
{
    $id_login=Auth::user()->id;
    DB::table("carts")->where(["id"=>$request->product_id,"user_id"=>$id_login])->delete();

}
}
