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
        $this->publishes([__DIR__.'/../../../config/Bookings.php' => config_path('bookings.php')]);
        $this->publishes([
            __DIR__.'/../../../database/migrations/' => database_path('migrations')
        ], 'migrations');
        $this->publishes([
            __DIR__.'/../../../database/seeds/' => database_path('seeds')
        ], 'seeds');

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