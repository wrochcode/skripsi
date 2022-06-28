<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecomendationController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::resource('product', ProductController::class);
Route::resource('recomendation', RecomendationController::class);
Route::resource('about', AboutController::class);
Route::resource('article', ArticleController::class);
