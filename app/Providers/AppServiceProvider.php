<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\ProductType;
use Cart;

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
        view()->composer('page.layout',function($view){
            $product_types = ProductType::all();
            $view->with('product_types',$product_types);
        });

        view()->composer('page.product_type',function($view){
            $areas = Area::all();
            $view->with('areas',$areas);
        });

        view()->composer('page.layout',function($view){
            $areas = Area::all();
            $content = Cart::getContent();
            $check = Cart::isEmpty();
            $getTotalQuantity = Cart::getTotalQuantity();
            $total = Cart::getTotal();
            $view->with(['areas'=>$areas,'content'=>$content,'check'=>$check,'getTotalQuantity'=>$getTotalQuantity,'total'=>$total]);
        });

    }
}
