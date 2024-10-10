<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmailController;

use App\Http\kernel;





// Route::get('/', [CategoryController::class, 'index'])->name('index.home');
// Route::get('/products', [CategoryController::class, 'show'])->name('product.show');
// Route::get('/list/product', [CategoryController::class, 'final'])->name('index.home');
// Route::get('/sendemail', [EmailController::class, 'sendEmail'])->name('send.email');

Route::group([], function() {
    Route::get('/', [CategoryController::class, 'index'])->name('index.home');
    Route::get('/products/{id}', [CategoryController::class, 'show'])->name('product.show');
    Route::get('/list/product/{id}', [CategoryController::class, 'final'])->name('product.final');
    Route::post('/sendemail', [EmailController::class, 'sendEmail'])->name('send.email');
    Route::get('/about-team',[CategoryController::class, 'team'])->name('about.team');
    Route::get('/thankyou',[CategoryController::class, 'thankyou'])->name('thank.you');
});

// Route::group(['middleware' => 'adminre'], function() {
//     Route::get('/', [CategoryController::class, 'index'])->name('index.home');
//     Route::get('/products', [CategoryController::class, 'show'])->name('product.show');
//     Route::get('/list/product', [CategoryController::class, 'final'])->name('product.list');
//     Route::get('/sendemail', [EmailController::class, 'sendEmail'])->name('send.email');
// });

// Route::group(['middleware' => 'admin.redirect'], function() {
//     Route::get('/', [CategoryController::class, 'index'])->name('index.home');
//     Route::get('/products', [CategoryController::class, 'show'])->name('product.show');
//     Route::get('/list/product', [CategoryController::class, 'final'])->name('index.home');
//     Route::get('/sendemail', [EmailController::class, 'sendEmail'])->name('send.email');
// });
// // Route::group(['middleware' => 'admin.guest'], function() {
//    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// });


Route::group(['prefix' => 'admin'],function(){

    Route::group(['middleware' => 'admin.guest'], function() {
        Route::get('login', [LoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('category/create', [DashboardController::class, 'create_category'])->name('create.category');
        Route::get('category/product', [DashboardController::class, 'create_product'])->name('create.product');
        Route::post('savedata', [DashboardController::class, 'form'])->name('save.form');
        Route::post('productform', [DashboardController::class, 'productform'])->name('save.product');
        Route::get('category', [DashboardController::class, 'categories'])->name('admin.categoty');
        Route::get('product', [DashboardController::class, 'product'])->name('admin.product');
        Route::post('/category/toggle-status/{id}', [DashboardController::class, 'toggleStatus'])->name('category.toggle-status');
        Route::post('/product/toggle-status/{id}', [DashboardController::class, 'toggleStatuspro'])->name('product.toggle-status');

        Route::delete('/category/delete/{id}', [DashboardController::class, 'categorydestroy'])->name('category.destroy');
        Route::delete('/product/delete/{id}', [DashboardController::class, 'productdestroy'])->name('product.destroy');

        Route::get('/category/edit/{id}', [DashboardController::class, 'editCategory'])->name('edit.category');
        Route::put('/category/update/{id}', [DashboardController::class, 'updateCategory'])->name('update.form');

        Route::get('/product/edit/{id}', [DashboardController::class, 'edit'])->name('edit.product');
        Route::put('/product/update/{id}', [DashboardController::class, 'update'])->name('update.product');

    });

});