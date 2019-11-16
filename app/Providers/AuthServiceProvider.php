<?php

namespace App\Providers;

use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Product::class => ProductPolicy::class
        //Cách 2
        //'App\Models\Product' => 'App\Policies\ProductPolicy'
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('delete-product', function ($user){
            //chi admin moi xoa duoc bai
//            dd($user->is_admin);
            return $user->is_admin == 1;
        });

        Gate::define('update-product', function ($user, $product){
            //user tao co the sua thong tin
            return $user->id == $product->user_id || $user->is_admin == 1;
        });
    }
}
