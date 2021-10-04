<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Rules\ArrayOfIntegers;

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
        \Validator::extend('array_of_integers', function ($attribute, $value, $parameters, $validator) 
        {
                return ((new ArrayOfIntegers())->passes($attribute, $value));
        });
        \Validator::replacer('array_of_integers', function ($message, $attribute, $rule, $parameters) {
            return ((new ArrayOfIntegers())->message($attribute));
        });
    }
}
