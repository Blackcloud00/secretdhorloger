<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\PageHomeController;

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

Route::group(['prefix'=>'{locale?}', 'middleware'=> ['sitesetting', 'categorie','localize','pages_sabit','campaigns']], function(){
    Route::get('/', [PageHomeController::class, 'homepage'])->name('homepage');
    Route::get('/about',[PageController::class,'about'])->name('about');

    Route::get('/campaigns',[PageController::class,'campaigns'])->name('campaigns');
    Route::get('/campaign/detail',[PageController::class,'campaigndetail'])->name('campaigndetail');

    Route::get('/search',[PageController::class,'search'])->name('search');

    Route::get('/information/{slug}',[PageController::class,'information'])->name('information');

    Route::get('/categories/{slug}',[PageController::class,'productscategorie'])->name('productscategorie');
    Route::get('/products',[PageController::class,'products'])->name('products');
    Route::get('/product/{slug}',[PageController::class,'productdetail'])->name('productdetail');

    Route::get('/contact',[PageController::class,'contact'])->name('contact');
    Route::post('/contact/save',[AjaxController::class,'contactsave'])->name('contact.save');

    Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist');
    Route::post('/wishlist/add',[WishlistController::class,'add'])->name('wishlist.add');
    Route::post('/wishlist/remove',[WishlistController::class,'remove'])->name('wishlist.remove');

    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
    Route::post('/checkout/add',[CheckoutController::class,'add'])->name('checkout.add');


    Route::get('/result',[PageController::class,'result'])->name('result');
    Auth::routes();

    Route::get('/exit',[AjaxController::class,'logout'])->name('exit');
});


