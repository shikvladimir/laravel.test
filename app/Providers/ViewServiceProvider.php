<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\ViewComposers\CartCountComposer;
use App\ViewComposers\CategoriesComposer;
use App\ViewComposers\ShowListComposer;
use App\ViewComposers\SumComposer;
use App\ViewComposers\WishListCountComposer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
            View::composer('*',CategoriesComposer::class);
            View::composer('*',CartCountComposer::class);
            View::composer('*',WishListCountComposer::class);
            View::composer('*',ShowListComposer::class);
            View::composer('*',SumComposer::class);

        view()->share('site_name', 654656 );
    }
}
