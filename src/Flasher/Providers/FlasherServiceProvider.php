<?php

namespace Flasher\Providers;

use Flasher\Support\Notifier;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Flasher\Middleware\ShareFlasherMessagesFromSession;

class FlasherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('flasher', function () {
            return $this->app->make(Notifier::class);
        });

        Route::pushMiddlewareToGroup('web', ShareFlasherMessagesFromSession::class);
    }
}
