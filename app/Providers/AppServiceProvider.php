<?php

namespace App\Providers;

use App\Support\Storage\Contracts\StorageInteface;
use App\Support\Storage\SessionStorage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $this->app->bind(StorageInteface::class , function ($app){
            return new SessionStorage('card');
        });
    }
}
