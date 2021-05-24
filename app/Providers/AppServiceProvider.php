<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Clients\PterodactylClient;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('petro', PterodactylClient::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.force_https')) {
            URL::forceScheme('https');
        }
    }
}
