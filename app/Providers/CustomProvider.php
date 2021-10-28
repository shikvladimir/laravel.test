<?php

namespace App\Providers;

use App\Contracts\ProductServiceInterface;
use App\Services\CustomProductService;
use App\Services\NewProductService;
use Illuminate\Support\ServiceProvider;

class CustomProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductServiceInterface::class,CustomProductService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        dump('1111111');
    }
}
