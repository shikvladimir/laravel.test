<?php

use App\Http\Controllers\Api\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('miSite', function () {
    mail('vnstore2018@gmail.com', 'homeWork','Hello World!');
});

Route::get('miSiteTest', function () {
   Mail::to('test@gmail.com')->send(new \App\Mail\OrderCompleted('new! new! new!'));
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
