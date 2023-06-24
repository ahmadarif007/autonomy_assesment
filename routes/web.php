<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\ProductController;


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

Route::get('/', [MainController::class, 'homeContent']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'adminHome'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

        
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//categorywise product
Route::get('/category/product/{id}', [ProductController::class, 'categoryWiseProduct'])->name('categorywise.product');
Route::get('/subcategory/product/{id}', [ProductController::class, 'SubcategoryWiseProduct'])->name('subcategorywise.product');
Route::get('/childcategory/product/{id}', [ProductController::class, 'ChildcategoryWiseProduct'])->name('childcategorywise.product');
Route::get('/brandwise/product/{id}', [ProductController::class, 'BrandWiseProduct'])->name('brandwise.product');

//__ for product //
Route::get('/all-products', [ProductController::class, 'allProducts'])->name('all.products');
Route::get('/product-details/{slug}', [ProductController::class, 'product_details'])->name('product.details');

//__ product filter __//
Route::get('/search-product',[ProductController::class,'search_products'])->name('search.products');
Route::get('/sort-by',[ProductController::class,'sort_by'])->name('sort.by');