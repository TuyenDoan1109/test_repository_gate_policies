<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;

use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use App\Repositories\Subcategory\SubcategoryRepository;

use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Admin\AdminRepository;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Product\ProductRepository;

use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Role\RoleRepository;

use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Permission\PermissionRepository;

use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Post\PostRepository;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->singleton(
            SubcategoryRepositoryInterface::class,
            SubcategoryRepository::class
        );

        $this->app->singleton(
            AdminRepositoryInterface::class,
            AdminRepository::class
        );

        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->singleton(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
        );

        $this->app->singleton(
            PostRepositoryInterface::class,
            PostRepository::class
        );

        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
