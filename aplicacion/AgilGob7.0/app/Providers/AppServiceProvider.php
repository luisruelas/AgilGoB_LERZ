<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('alphanum_first', function ($attribute, $value) {
                $first_char=$value[0];
                 if($first_char !== '_' || 
                    ctype_digit($first_char) ||
                    ctype_alpha($first_char))
                    return true;
                else
                    return false;
             });
    }
}
