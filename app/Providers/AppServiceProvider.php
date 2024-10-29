<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Prometheus\CollectorRegistry;
use Prometheus\Storage\Redis;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $redisAdapter = new Redis([
            'host' => '127.0.0.1',
            'port' => 6379
        ]);

        app()->singleton(CollectorRegistry::class, function () use ($redisAdapter){
            return new CollectorRegistry($redisAdapter);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
