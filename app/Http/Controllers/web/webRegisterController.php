<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class webRegisterController extends Controller
{
public function index()
{
   return view("web.register");
}

public function store(Request $request)
{
    $data=$request->validate([
      "name"=>"required",
      "email"=>"required|email|unique:users,email",
      "password"=>"required|min:5"
    ]);
    
   $user= User::create($data);
    Auth::login($user);
    return to_route("web/index");
}

}
