<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;
use App\Http\Controllers\API\v1\CategoryController;
use App\Http\Controllers\API\v1\SubcategoryController;
use App\Http\Controllers\API\v1\BrandController;
use App\Http\Controllers\API\v1\ProductController;
use App\Http\Controllers\API\v1\PostController;
use App\Http\Controllers\API\v1\RoleController;
use App\Http\Controllers\API\v1\PermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Api\v1')->prefix('v1')->group(function() {

    // ======================== PUBLIC ROUTE ==============================
    // Authentication
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [RegisterController::class, 'register']);
        Route::post('/login', [LoginController::class, 'login']);
    });

    // Post
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index']);
        Route::post('/', [PostController::class, 'store']);
        Route::get('/{id}', [PostController::class, 'show']);
    });

    // Category
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'show']);
    });

    // ======================== END PUBLIC ROUTE ==============================









    // ============================== PROTECTED ROUTES =========================
    Route::group(['middleware' => ['auth:api']], function() {
        // Auth
        Route::group(['prefix' => 'auth'], function () {
            Route::post('/logout', [LoginController::class, 'logout']);
        });

        // Post
        Route::group(['prefix' => 'posts'], function () {
            Route::put('/{id}', [PostController::class, 'update']);
            Route::delete('/{id}', [PostController::class, 'destroy']);
        });

        // Category
        Route::group(['prefix' => 'categories'], function () {
            Route::put('/{id}', [CategoryController::class, 'update']);
            Route::delete('/{id}', [CategoryController::class, 'destroy']);
        });

    });
    // ============================== END PROTECTED ROUTES =========================


});
