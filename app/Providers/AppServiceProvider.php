<?php

namespace App\Providers;

use AfricasTalking\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind('sms', function ($app) {
            return new Gateway(env('SMS_USERNAME'), env('SMS_API_KEY'));
        });
    }
}
