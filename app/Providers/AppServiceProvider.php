<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Braintree\Gateway;

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
        $this->app->singleton(Gateway::class , function($app){
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'qdz7rvc793kftdtv',
                'publicKey' => '54863dt2hjkdb838',
                'privateKey' => '21c3062d76a0c0411c1a294f41e3eea6'
            ]);
        });

    }
}
