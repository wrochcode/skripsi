<?php

use App\Http\Controllers\AboutAdmin;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecomendationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// user
Route::get('/', HomeController::class);
Route::resource('product', ProductController::class);
// Route::resource('recomendation', RecomendationController::class);
Route::resource('about', AboutController::class);
Route::resource('article', ArticleController::class);

// admin
Route::resource('aboutadmin', AboutAdmin::class);


// login
Route::middleware('auth')->group(function(){
    Route::resource('recomendation', RecomendationController::class);
    // Route::resource('admin', UserController::class);
    Route::resource('admin', AdminController::class);
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::get('register', [RegistrationController::class, 'create'])->name('register');
    Route::post('register', [RegistrationController::class, 'store']);

    Route::get('masuk', [MasukController::class, 'create'])->name('masuk');
    Route::post('masuk', [MasukController::class, 'store']);
});