<?php

namespace App\Providers;

use App\Services\Pushall;
use Illuminate\Support\ServiceProvider;

class PushallServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Pushall::class, function () {
            return new Pushall(config('notifications.pushall.api.key'), config('notifications.pushall.api.id'));
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
