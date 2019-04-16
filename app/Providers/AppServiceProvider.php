<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\KaleoService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configuration = [];

        if (file_exists($file = getcwd() . '/kaleo.config.php')) {
            $configuration = include_once $file;
        }

        $this->app->singleton('kaleo', function () use ($configuration) {
            return new KaleoService($configuration);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
