<?php

namespace App\Providers;

use App\Contracts\TransactionInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(TransactionInterface::class, function () {
            return (new \App\Services\TransactionCodeGenerator());
        });

        // force https scheme
        URL::forceScheme('https');
    }
}
