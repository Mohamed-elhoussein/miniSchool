<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\web\AjaxController;
use App\Http\Controllers\web\webLoginController;
use App\Http\Controllers\web\webLogoutController;
use App\Http\Controllers\web\webRegisterController;
use App\Http\Controllers\web\ProductDetailsController;

Route::controller(WebController::class)->group(function(){
Route::get("/","index")->name("web/index");
});

Route::controller(AjaxController ::class)->group(function(){
    Route::post("web/addCart","addCart")->name("web/addCart");
    Route::delete("web/DeleteCart","destroy")->name("web/DeleteCart");
    });

Route::get("register",[webRegisterController::class,"index"])->name("register");
Route::post("create/account",[webRegisterController::class,"store"])->name("userCreate");

Route::get("login",[webLoginController::class,"index"])->name("login");
Route::post("Check/login",[webLoginController::class,"login"])->name("checklogin");

Route::get("logout",[ webLogoutController::class,"logout"])->name("logout");


Route::get("ProductDetails/{id}",[ ProductDetailsController::class,"Details"])->name("ProductDetails");