<?php

namespace Muzammil9555\SubscriptionPlansForStripe;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/./routes/web.php');
        $this->loadViewsFrom(__DIR__.'/./views', 'subscription-plans-for-stripe');
        $this->loadMigrationsFrom(__DIR__.'/./Migrations');
    }

    public function register()
    {
        // Register any bindings, services, etc.
    }
}
