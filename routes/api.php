<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'product'], function(){
	Route::get('/', [ProductController::class, 'index']);
	Route::post('/store', [ProductController::class, 'store']);
	Route::get('/show/{id}', [ProductController::class, 'show']);
	Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
	Route::patch('/update/{id}', [ProductController::class, 'update']);
});
