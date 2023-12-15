<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\ProductsContentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware'=>['panelsetting','auth'], 'prefix'=>'panel', 'as' => 'panel.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/add', [SliderController::class, 'create'])->name('slider.create');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::put('/slider/{id}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{id}/destroy', [SliderController::class, 'destroy'])->name('slider.destroy');

    Route::get('/categorie', [CategoriesController::class, 'index'])->name('categorie.index');
    Route::get('/categorie/add', [CategoriesController::class, 'create'])->name('categorie.create');
    Route::get('/categorie/{id}/edit', [CategoriesController::class, 'edit'])->name('categorie.edit');
    Route::post('/categorie/store', [CategoriesController::class, 'store'])->name('categorie.store');
    Route::put('/categorie/{id}/update', [CategoriesController::class, 'update'])->name('categorie.update');
    Route::delete('/categorie/{id}/destroy', [CategoriesController::class, 'destroy'])->name('categorie.destroy');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/add', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/productcontent', [ProductsContentController::class, 'index'])->name('productcontent.index');
    Route::get('/productcontent/add', [ProductsContentController::class, 'create'])->name('productcontent.create');
    Route::get('/productcontent/{id}/edit', [ProductsContentController::class, 'edit'])->name('productcontent.edit');
    Route::post('/productcontent/store', [ProductsContentController::class, 'store'])->name('productcontent.store');
    Route::put('/productcontent/{id}/update', [ProductsContentController::class, 'update'])->name('productcontent.update');
    Route::delete('/productcontent/{id}/destroy', [ProductsContentController::class, 'destroy'])->name('productcontent.destroy');

    Route::get('/sitesetting', [SiteSettingController::class, 'index'])->name('sitesetting.index');
    Route::get('/sitesetting/{id}/edit', [SiteSettingController::class, 'edit'])->name('sitesetting.edit');
    Route::put('/sitesetting/{id}/update', [SiteSettingController::class, 'update'])->name('sitesetting.update');

    Route::get('/order', [OrdersController::class, 'index'])->name('order.index');
    Route::get('/order/{id}/edit', [OrdersController::class, 'edit'])->name('order.edit');
    Route::post('/order/store', [OrdersController::class, 'store'])->name('order.store');
    Route::put('/order/{id}/update', [OrdersController::class, 'update'])->name('order.update');
    Route::delete('/order/{id}/destroy', [OrdersController::class, 'destroy'])->name('order.destroy');
});
