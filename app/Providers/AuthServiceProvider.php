<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Constants\UserConst;
use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::resource('product', ProductPolicy::class);
//        Gate::define('isAdmin', function($user) {
//            return $user->role == UserConst::ADMIN;
//        });
//
//        Gate::define('isClient', function($user) {
//            return $user->role == UserConst::CLIENT;
//        });

//        Gate::define('delete-product', function (User $user, Product $product) {
//            return $user->id == $product->author;
//        });
//        Gate::define('delete', 'App\Policies\ProductPolicy@delete');
    }
}
