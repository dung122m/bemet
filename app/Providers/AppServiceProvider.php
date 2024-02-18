<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

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
        view()->composer(['web.master.header','web.home.category'], function ($view) {
            $categories = Category::orderBy('name','ASC')->where('status',1)->get();
            
            $view->with(compact("categories"));
        });
        view()->composer(['web.master.header','web.home.cart'], function ($view) {
            $cartCount = Cart::count();
            
            $view->with(compact("cartCount"));
        });
        
    }
}
