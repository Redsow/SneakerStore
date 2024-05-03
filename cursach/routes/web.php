<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MistakeController;
use App\Http\Controllers\ReviewsController;



require_once __DIR__ . '/auth.php';

Route::get('/home',[HomeController::class,'index']);
Route::get('/', [ProductController::class, 'index'])->name('product');
Route::get('/products/filter/category', [ProductController::class, 'filterByCategory'])->name('products.filterByCategory');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'addItem'])->name('cart.add');
Route::get('/cart/delete/{id}', [CartController::class, 'deleteItem'])->name('cart.remove');
Route::group(['auth'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::delete('/admin/users/{id}',[ProfileController::class,'destroy'])->name('admin.users.destroy');

    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/create_category', [ProductController::class, 'create_category'])->name('admin.products.create_category');
    Route::post('/admin/products/store_category', [ProductController::class, 'storeCategory'])->name('admin.products.store_category');
});
Route::get('/mistake', [MistakeController::class, 'index'])->name('mistake');
Route::get('/reviews', [ReviewsController::class, 'allReviews'])->name('reviews');
Route::post('/review/create', [ReviewsController::class, 'CreateReview'])->name('create.review');
Route::post('/review/store', [ReviewsController::class, 'storeReview'])->name('store.review');





