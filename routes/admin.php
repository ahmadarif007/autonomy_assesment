<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ChildcategoryController;
use App\Http\Controllers\Backend\ProductController;


//category routes
Route::group(['prefix'=>'category'], function(){
	Route::get('/', [CategoryController::class, 'index'])->name('category.index');
	Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
	Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
	Route::get('/edit/{id}', [CategoryController::class, 'edit']);
	Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
});

//subcategory routes
Route::group(['prefix'=>'subcategory'], function(){
	Route::get('/', [SubcategoryController::class, 'index'])->name('subcategory.index');
	Route::post('/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
	Route::get('/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');
	Route::get('/edit/{id}', [SubcategoryController::class, 'edit']);
	Route::post('/update', [SubcategoryController::class, 'update'])->name('subcategory.update');
});

//childcategory routes
Route::group(['prefix'=>'childcategory'], function(){
	Route::get('/', [ChildcategoryController::class, 'index'])->name('childcategory.index');
	Route::post('/store', [ChildcategoryController::class, 'store'])->name('childcategory.store');
	Route::get('/delete/{id}', [ChildcategoryController::class, 'destroy'])->name('childcategory.delete');
	Route::get('/edit/{id}', [ChildcategoryController::class, 'edit']);
	Route::post('/update', [ChildcategoryController::class, 'update'])->name('childcategory.update');
});

//product routes
Route::group(['prefix'=>'product'], function(){
	Route::get('/', [ProductController::class, 'index'])->name('product.index');
	Route::get('/create', [ProductController::class, 'create'])->name('product.create');
	Route::post('/store', [ProductController::class, 'store'])->name('product.store');
	Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
	Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
	Route::post('/update', [ProductController::class, 'update'])->name('product.update');
	Route::get('/active-status/{id}','ProductController@activestatus');
	Route::get('/not-status/{id}','ProductController@notstatus');
});