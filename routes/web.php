<?php

use App\Http\Controllers\AdminController\BrandController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\DiscountController;
use App\Http\Controllers\AdminController\GalleryController;
use App\Http\Controllers\AdminController\PanelController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\AdminController\RoleController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\ClientController\ProductController as ClientProductController;
use App\Http\Controllers\ClientController\indexController;
use App\Http\Controllers\ClientController\RegisterController;
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

/**
 * client
 **/

Route::prefix('')->group(function (){
    Route::get('/',[indexController::class,'index'])->name('index.page');
    Route::get('productDetails/{product}',[ClientProductController::class,'show'])->name('productDetails.show');
    Route::get('register',[RegisterController::class,'create'])->name('register');
    Route::post('register/sendmail',[RegisterController::class,'sendmail'])->name('register.sendmail');


    Route::get('register/otp/{user}',[RegisterController::class,'otp'])->name('register.otp');
    Route::post('register/verifyOtp/{user}', [RegisterController::class, 'verifyOtp'])->name('register.verifyOtp');
    Route::get('register/logout', [RegisterController::class,'logout'])->name('logout');

});

/**
 * adminPanel
**/

Route::prefix('adminPanel')->group(function () {
    Route::resource('/',PanelController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/brand',BrandController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/product.gallery',GalleryController::class);
    Route::resource('/product.discount',DiscountController::class);
    Route::resource('/role',RoleController::class);
    Route::resource('/user',UserController::class);
});

