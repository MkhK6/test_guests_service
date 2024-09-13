<?php

namespace App\Providers;

use App\Services\GuestService;
use Illuminate\Support\ServiceProvider;

class GuestServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(GuestService::class, function ($app) {
            return new GuestService();
        });
    }
}