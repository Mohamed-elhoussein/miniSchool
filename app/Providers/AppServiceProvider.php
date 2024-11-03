<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    foreach(config("permission.per") as $key=>$val){
        Gate::define($key,function($per)use($key){
            $per_login=Auth::guard("admin")->user()->permission;
            return in_array($key,$per_login);
        });
    }
    }
}
