<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])
    ->name('main_page');

Route::get('/catalog/{category}/{product}', [CatalogController::class, 'product'])
    ->name('product');

Route::get('/catalog/{category}', [CatalogController::class, 'category'])
    ->name('catalog_category');

Route::get('/catalog', [CatalogController::class, 'index'])
    ->name('catalog');

Route::prefix('adm')->name('admin.')->group(function (){
    Route::view('adm', 'admin.dashboard');
    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class
    ]);
});



