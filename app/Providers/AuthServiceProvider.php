<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\AdminPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\SubcategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('admin-view', function ($admin) {
////            dd($user);
//            return $admin->checkPermissionAccess('admin-view');
//        });

        // Admin
        Gate::define('admin-view', [AdminPolicy::class, 'view']);
        Gate::define('admin-add', [AdminPolicy::class, 'create']);
        Gate::define('admin-edit', [AdminPolicy::class, 'update']);
        Gate::define('admin-delete', [AdminPolicy::class, 'delete']);

        // Category
        Gate::define('category-view', [CategoryPolicy::class, 'view']);
        Gate::define('category-add', [CategoryPolicy::class, 'create']);
        Gate::define('category-edit', [CategoryPolicy::class, 'update']);
        Gate::define('category-delete', [CategoryPolicy::class, 'delete']);

        // Subcategory
        Gate::define('subcategory-view', [SubcategoryPolicy::class, 'view']);
        Gate::define('subcategory-add', [SubcategoryPolicy::class, 'create']);
        Gate::define('subcategory-edit', [SubcategoryPolicy::class, 'update']);
        Gate::define('subcategory-delete', [SubcategoryPolicy::class, 'delete']);

        // Product
        Gate::define('product-view', [ProductPolicy::class, 'view']);
        Gate::define('product-add', [ProductPolicy::class, 'create']);
        Gate::define('product-edit', [ProductPolicy::class, 'update']);
        Gate::define('product-delete', [ProductPolicy::class, 'delete']);

        // Post
        Gate::define('post-view', [PostPolicy::class, 'view']);
        Gate::define('post-add', [PostPolicy::class, 'create']);
        Gate::define('post-edit', [PostPolicy::class, 'update']);
        Gate::define('post-delete', [PostPolicy::class, 'delete']);
    }
}
