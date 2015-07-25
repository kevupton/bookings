<?php namespace Kevupton\Bookings\Providers;

use Illuminate\Support\ServiceProvider;

class BookingsServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/Bookings.php' => config_path('Bookings.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//
    }
}