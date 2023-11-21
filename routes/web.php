<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
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

Route::group(['prefix'=>'{locale?}', 'middleware'=> ['sitesetting', 'categorie','localize']], function(){
    Route::get('/', [PageHomeController::class, 'homepage'])->name('homepage');
    Route::get('/about',[PageController::class,'about'])->name('about');

    Route::get('/campaigns',[PageController::class,'campaigns'])->name('campaigns');
    Route::get('/campaign/detail',[PageController::class,'campaigndetail'])->name('campaigndetail');

    Route::get('/search',[PageController::class,'search'])->name('search');

    Route::get('/categories/{slug}',[PageController::class,'productscategorie'])->name('productscategorie');
    Route::get('/products',[PageController::class,'products'])->name('products');
    Route::get('/product/{slug}',[PageController::class,'productdetail'])->name('productdetail');

    Route::get('/contact',[PageController::class,'contact'])->name('contact');
    Route::post('/contact/save',[AjaxController::class,'contactsave'])->name('contact.save');

    Auth::routes();

    Route::get('/exit',[AjaxController::class,'logout'])->name('exit');
});


