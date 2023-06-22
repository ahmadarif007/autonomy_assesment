<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;


	//category routes
	Route::group(['prefix'=>'category'], function(){
		Route::get('/', [CategoryController::class, 'index'])->name('category.index');
	});

	
	