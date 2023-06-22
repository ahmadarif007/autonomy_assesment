<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;


	//category routes
	Route::group(['prefix'=>'category'], function(){
		Route::get('/', [CategoryController::class, 'index'])->name('category.index');
		Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
		Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
		Route::get('/edit/{id}', [CategoryController::class, 'edit']);
		Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
	});

	
	