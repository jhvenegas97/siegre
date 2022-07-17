<?php

namespace App\Providers;

use App\Library\Services\UserUdenarService;
use Illuminate\Support\ServiceProvider;

class UserUdenarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\UserUdenarService', function ($app) {
            return new UserUdenarService();
          });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
