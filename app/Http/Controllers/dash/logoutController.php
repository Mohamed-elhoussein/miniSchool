<?php

namespace App\Http\Controllers\dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
   public function Logout(){
    Auth::guard("admin")->logout();
    return to_route("dashLogin");
   }
}
