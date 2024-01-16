<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
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



/*
|--------------------------------------------------------------------------
|                              🕸  Admin-Panel 🕸
|--------------------------------------------------------------------------
*/

Route::prefix('/tasks_admin')->group(function () {


    //Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');


    //Product
    Route::prefix('/product')->group(function () {

        //Category
        Route::prefix('/category')->controller(CategoryController::class)->group(function () {

            Route::get('/', 'index')->name('admin.product.category.index');
            Route::get('/create', 'create')->name('admin.product.category.create');
            Route::post('/store', 'store')->name('admin.product.category.store');
            Route::get('/edit/{category}', 'edit')->name('admin.product.category.edit');
            Route::put('/update/{category}', 'update')->name('admin.product.category.update');
            Route::delete('/destroy/{category}', 'destroy')->name('admin.product.category.destroy');
            Route::get('/status/{category}', 'status')->name('admin.product.category.status');

        });


          //Products
          Route::prefix('/products')->controller(ProductController::class)->group(function () {

            Route::get('/', 'index')->name('admin.product.products.index');
            Route::get('/create', 'create')->name('admin.product.products.create');
            Route::post('/store', 'store')->name('admin.product.products.store');
            Route::get('/edit/{product}', 'edit')->name('admin.product.products.edit');
            Route::put('/update/{product}', 'update')->name('admin.product.products.update');
            Route::delete('/destroy/{product}', 'destroy')->name('admin.product.products.destroy');
            Route::get('/status/{product}', 'status')->name('admin.product.products.status');

        });
    });
});
