<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// BACKEND
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])
        ->name('dashboard');

    // Authentication
    Route::namespace('Auth')->group(function () {
        Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])
            ->name('login');
        Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
        Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])
            ->name('logout');
        Route::get('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegisterForm'])
            ->name('register');
        Route::post('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register']);
    });

    // Category
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])
        ->name('categories.index')
        ->middleware('can:category-view');
    Route::get('/categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])
        ->name('categories.create')
        ->middleware('can:category-add');
    Route::post('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'store'])
        ->name('categories.store');
    Route::get('/categories/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])
        ->name('categories.show');
    Route::get('/categories/{id}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])
        ->name('categories.edit')
        ->middleware('can:category-edit');
    Route::put('/categories/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])
        ->name('categories.update');
    Route::delete('/categories/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])
        ->name('categories.destroy')
        ->middleware('can:category-delete');
    Route::get('/categories-with-deleted', [App\Http\Controllers\Admin\CategoryController::class, 'indexWithDeleted'])
        ->name('categories.indexWithDeleted');
    Route::post('/categories-force-delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'forceDelete'])
        ->name('categories.forceDelete');
    Route::get('/categories-restore/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'restore'])
        ->name('categories.restore');

    // Subcategory
    Route::get('/subcategories', [App\Http\Controllers\Admin\SubcategoryController::class, 'index'])
        ->name('subcategories.index')
        ->middleware('can:subcategory-view');
    Route::get('/subcategories/create', [App\Http\Controllers\Admin\SubcategoryController::class, 'create'])
        ->name('subcategories.create')
        ->middleware('can:subcategory-add');
    Route::post('/subcategories', [App\Http\Controllers\Admin\SubcategoryController::class, 'store'])
        ->name('subcategories.store');
    Route::get('/subcategories/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'show'])
        ->name('subcategories.show');
    Route::get('/subcategories/{id}/edit', [App\Http\Controllers\Admin\SubcategoryController::class, 'edit'])
        ->name('subcategories.edit')
        ->middleware('can:subcategory-edit');
    Route::put('/subcategories/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'update'])
        ->name('subcategories.update');
    Route::delete('/subcategories/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'destroy'])
        ->name('subcategories.destroy')
        ->middleware('can:subcategory-delete');
    Route::resource('subcategories', App\Http\Controllers\Admin\SubcategoryController::class);
    Route::get('/subcategories-with-deleted', [App\Http\Controllers\Admin\SubcategoryController::class, 'indexWithDeleted'])
        ->name('subcategories.indexWithDeleted');
    Route::post('/subcategories-force-delete/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'forceDelete'])
        ->name('subcategories.forceDelete');
    Route::get('/subcategories-restore/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'restore'])
        ->name('subcategories.restore');

    // Product
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])
        ->name('products.index')
        ->middleware('can:product-view');
    Route::get('/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])
        ->name('products.create')
        ->middleware('can:product-add');
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])
        ->name('products.store');
    Route::get('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'show'])
        ->name('products.show');
    Route::get('/products/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])
        ->name('products.edit')
        ->middleware('can:product-edit');
    Route::put('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])
        ->name('products.update');
    Route::delete('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])
        ->name('products.destroy')
        ->middleware('can:product-delete');
    Route::get('/products-with-deleted', [App\Http\Controllers\Admin\ProductController::class, 'indexWithDeleted'])
        ->name('products.indexWithDeleted');
    Route::post('/products-force-delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'forceDelete'])
        ->name('products.forceDelete');
    Route::get('/products-restore/{id}', [App\Http\Controllers\Admin\ProductController::class, 'restore'])
        ->name('products.restore');

    // Post
    Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])
        ->name('posts.index')
        ->middleware('can:post-view');
    Route::get('/posts/create', [App\Http\Controllers\Admin\PostController::class, 'create'])
        ->name('posts.create')
        ->middleware('can:post-add');
    Route::post('/posts', [App\Http\Controllers\Admin\PostController::class, 'store'])
        ->name('posts.store');
    Route::get('/posts/{id}', [App\Http\Controllers\Admin\PostController::class, 'show'])
        ->name('posts.show');
    Route::get('/posts/{id}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])
        ->name('posts.edit')
        ->middleware('can:post-edit,id');
    Route::put('/posts/{id}', [App\Http\Controllers\Admin\PostController::class, 'update'])
        ->name('posts.update');
    Route::delete('/posts/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])
        ->name('posts.destroy')
        ->middleware('can:post-delete,id');
    Route::get('/posts-with-deleted', [App\Http\Controllers\Admin\PostController::class, 'indexWithDeleted'])
        ->name('posts.indexWithDeleted');
    Route::post('/posts-force-delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'forceDelete'])
        ->name('posts.forceDelete');
    Route::get('/posts-restore/{id}', [App\Http\Controllers\Admin\PostController::class, 'restore'])
        ->name('posts.restore');

    // Admin
//    Route::resource('admins', App\Http\Controllers\Admin\AdminController::class);
    Route::get('/admins', [App\Http\Controllers\Admin\AdminController::class, 'index'])
        ->name('admins.index')
        ->middleware('can:admin-view');
    Route::get('/admins/create', [App\Http\Controllers\Admin\AdminController::class, 'create'])
        ->name('admins.create')
        ->middleware('can:admin-add');
    Route::post('/admins', [App\Http\Controllers\Admin\AdminController::class, 'store'])
        ->name('admins.store');
    Route::get('/admins/{id}', [App\Http\Controllers\Admin\AdminController::class, 'show'])
        ->name('admins.show');
    Route::get('/admins/{id}/edit', [App\Http\Controllers\Admin\AdminController::class, 'edit'])
        ->name('admins.edit')
        ->middleware('can:admin-edit');
    Route::put('/admins/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update'])
        ->name('admins.update');
    Route::delete('/admins/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])
        ->name('admins.destroy')
        ->middleware('can:admin-delete');
    Route::get('/admins-edit-permission/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editPermission'])
        ->name('admins.editPermission');
    Route::post('/admins-update-permission', [App\Http\Controllers\Admin\AdminController::class, 'updatePermission'])
        ->name('admins.updatePermission');
    Route::get('/admins-with-deleted', [App\Http\Controllers\Admin\AdminController::class, 'indexWithDeleted'])
        ->name('admins.indexWithDeleted');
    Route::post('/admins-force-delete/{id}', [App\Http\Controllers\Admin\AdminController::class, 'forceDelete'])
        ->name('admins.forceDelete');
    Route::get('/admins-restore/{id}', [App\Http\Controllers\Admin\AdminController::class, 'restore'])
        ->name('admins.restore');
    Route::get('/admins-edit-role/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editRole'])
        ->name('admins.editRole');
    Route::post('/admins-update-role', [App\Http\Controllers\Admin\AdminController::class, 'updateRole'])
        ->name('admins.updateRole');

    // Role
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::get('/roles-with-deleted', [App\Http\Controllers\Admin\RoleController::class, 'indexWithDeleted'])
        ->name('roles.indexWithDeleted');
    Route::post('/roles-force-delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'forceDelete'])
        ->name('roles.forceDelete');
    Route::get('/roles-restore/{id}', [App\Http\Controllers\Admin\RoleController::class, 'restore'])
        ->name('roles.restore');
    Route::get('/roles-edit-permission/{id}', [App\Http\Controllers\Admin\RoleController::class, 'editPermission'])
        ->name('roles.editPermission');
    Route::post('/roles-update-permission', [App\Http\Controllers\Admin\RoleController::class, 'updatePermission'])
        ->name('roles.updatePermission');

    // Permission
    Route::resource('permissions', App\Http\Controllers\Admin\PermissionController::class);
    Route::get('/permissions-with-deleted', [App\Http\Controllers\Admin\PermissionController::class, 'indexWithDeleted'])
        ->name('permissions.indexWithDeleted');
    Route::post('/permissions-force-delete/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'forceDelete'])
        ->name('permissions.forceDelete');
    Route::get('/permissions-restore/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'restore'])
        ->name('permissions.restore');
});




// FRONTEND
Route::get('/', [App\Http\Controllers\PageController::class, 'index'])
    ->name('home');
Route::namespace('Auth')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
        ->name('logout');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])
        ->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
});
