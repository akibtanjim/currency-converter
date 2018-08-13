<?php

namespace AkibTanjim\Currency;

use AkibTanjim\Currency\Currency;
use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfiguration();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $config = __DIR__ . '/config/currency.php';
        $this->mergeConfigFrom($config, 'currency');
        $this->app->singleton('currency', function()
        {
            return new Currency();
        });
    }

    public function publishConfiguration()
    {
        $path   =   realpath(__DIR__.'/config/currency.php');
        $this->publishes([$path => config_path('currency.php')], 'config');
    }
}
