<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RandProductsController;
use App\Http\Controllers\WishListController;
use App\Http\Middleware\ChackTimeCreatedUser;
use App\Http\Middleware\CheckPassword;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])
    ->name('main_page');

Route::get('search', [HomeController::class, 'search'])
    ->name('search');

Route::get('register',[LoginController::class, 'register'])
    ->name('register');

Route::post('register',[LoginController::class, 'registration'])
    ->name('registration');

Route::get('login',[LoginController::class, 'login'])
    ->name('login');

Route::post('login',[LoginController::class, 'checkLogin'])
    ->name('checkLogin');

Route::get('/catalog/{category}/{product}', [CatalogController::class, 'product'])
    ->name('product');

Route::get('/catalog/{category}', [CatalogController::class, 'category'])
    ->name('catalog_category');

Route::get('/catalog', [CatalogController::class, 'index'])
    ->name('catalog');

Route::get('/randProducts',[RandProductsController::class, 'product'])
    ->name('randProducts')
    ->middleware([ChackTimeCreatedUser::class]);

Route::post('/add_to_cart', [CartController::class,'addToCart'] )
    ->name('add_to_cart');

Route::get('/cart',[CartController::class,'showCart'])
    ->name('cart');

Route::post('/delete_to_cart/{id}',[CartController::class,'destroy'])
    ->name('delete_to_cart');

Route::post('/add_to_wishlist', [WishListController::class,'addToWishlist'] )
    ->name('add_to_wishlist');

Route::get('/wishlist', [WishListController::class,'showWishlist'] )
    ->name('wishlist');


Route::prefix('adm')->name('admin.')
    ->middleware(CheckPassword::class)
    ->group(function (){
    Route::view('adm', 'admin.dashboard');
    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class
    ]);
});



