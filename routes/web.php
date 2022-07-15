<?php

use App\Http\Controllers\AboutAdmin;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodRecomendationController;
use App\Http\Controllers\FoodUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\RecomendationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// user
Route::get('/', HomeController::class);
Route::resource('about', AboutController::class);
Route::resource('article', ArticleController::class);
Route::resource('recomendation', RecomendationController::class);

// login
Route::middleware('auth')->group(function(){
    // admin
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('aboutadmins', AboutAdmin::class);
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user', [UserController::class, 'store'])->name('user.store');

    //food Main
    Route::get('food', [FoodController::class, 'index'])->name('food.index');
    Route::post('food', [FoodController::class, 'store'])->name('food.store');
    Route::get('food/{id}/edit', [FoodController::class, 'edit'])->name('food.edit');
    Route::put('food/{id}', [FoodController::class, 'update'])->name('food.update');
    Route::delete('food/{id}', [FoodController::class, 'destroy'])->name('food.destroy');
    
    //food recomen
    Route::get('foodrecomen', [FoodRecomendationController::class, 'index'])->name('foodrecomend.index');
    Route::post('foodrecomen', [FoodRecomendationController::class, 'store'])->name('foodrecomend.store');
    Route::get('foodrecomen/{id}/edit', [FoodRecomendationController::class, 'edit'])->name('foodrecomend.edit');
    Route::put('foodrecomen/{id}', [FoodRecomendationController::class, 'update'])->name('foodrecomend.update');
    Route::delete('foodrecomen/{id}', [FoodRecomendationController::class, 'destroy'])->name('foodrecomend.destroy');
    
    //food user
    Route::get('fooduser', [FoodUserController::class, 'index'])->name('fooduser.index');
    Route::post('fooduser', [FoodUserController::class, 'store'])->name('fooduser.store');
    Route::get('fooduser/{id}/edit', [FoodUserController::class, 'edit'])->name('fooduser.edit');
    Route::put('fooduser/{id}', [FoodUserController::class, 'update'])->name('fooduser.update');
    Route::delete('fooduser/{id}', [FoodUserController::class, 'destroy'])->name('fooduser.destroy');
    
    // logout
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::get('register', [RegistrationController::class, 'create'])->name('register');
    Route::post('register', [RegistrationController::class, 'store']);

    Route::get('masuk', [MasukController::class, 'create'])->name('masuk');
    Route::post('masuk', [MasukController::class, 'store']);
});

// php artisan route:cache