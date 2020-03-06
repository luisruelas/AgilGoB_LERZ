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
        Validator::extend('alphanum', function ($attribute, $value) {
            dd($attribute);
                $first_char=$value[0];
                //primer dígito
                 if($first_char !== '_' || 
                    ctype_digit($first_char) ||
                    ctype_alpha($first_char))
                    return false;
                else
                    return ctype_alnum($value);
             });
    }
}
