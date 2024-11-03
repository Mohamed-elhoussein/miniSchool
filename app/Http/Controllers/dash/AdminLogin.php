<?php
namespace App\Http\Controllers\dash;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLogin extends Controller
{
 public function index()
 {
    return view("DashLogin");
 }

 public function check(Request $request)
 {
   if(Auth::guard("admin")->attempt(["email"=>$request->email,"password"=>$request->password])){
      return to_route('user.index');
   }
   return to_route('dashLogin');
 }
}
