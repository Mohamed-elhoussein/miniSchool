<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class webLoginController extends Controller
{
public function index()
{
    return view("web.login");
}
public function login(Request $request)
{
    if(Auth::attempt(["email"=>$request->email,"password"=>$request->password]))
    {
        return to_route("web/index");
    }
    return view("web.login");
}

}
