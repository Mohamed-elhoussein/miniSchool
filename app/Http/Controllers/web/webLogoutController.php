<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class webLogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return to_route("web/index");
    }
}
