<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dash\AdminLogin;
use App\Http\Controllers\dash\UserController;
use App\Http\Controllers\dash\logoutController;
use App\Http\Controllers\dash\ProductController;


Route::controller(AdminLogin::class)->middleware('adminlogout')->group(function(){
    Route::get("Login","index")->name("dashLogin");
    Route::post("LoginCheck","check")->name("dashLoginCheck");
});
   Route::get("logout",[logoutController::class,"logout"])->name("dashLogout");
Route::resource("user",UserController::class)->middleware('adminlogin');
Route::resource("product",ProductController::class)->middleware('adminlogin');