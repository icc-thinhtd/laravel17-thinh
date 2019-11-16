<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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
        $listCat = Cache::remember('listCat',6000,function (){
            return Category::get();
        });
        $product_recent = Product::where('price_status', 0)->simplePaginate(10);

//        dd($contact_info);

        View::share('listCat',$listCat);
        View::share('product_recent',$product_recent);
        //
        View::share('cart_count',Cart::count());
    }
}
