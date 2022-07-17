<?php

use App\Http\Controllers\AboutAdmin;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodMenuController;
use App\Http\Controllers\FoodRecomendationController;
use App\Http\Controllers\FoodUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\RecomendationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;


// user
Route::get('/', HomeController::class);
Route::get('about', [AboutController::class, 'index'])->name('about.index');
Route::resource('article', ArticleController::class);
Route::resource('recomendation', RecomendationController::class);

// kalkulator
Route::get('bmi', [CalcController::class, 'bmi'])->name('bmi.index');
Route::post('bmi', [CalcController::class, 'bmistore'])->name('bmi.store');
Route::get('rmr', [CalcController::class, 'rmr'])->name('rmr.index');
Route::post('rmr', [CalcController::class, 'rmrstore'])->name('rmr.store');
Route::get('eer', [CalcController::class, 'eer'])->name('eer.index');
Route::post('eer', [CalcController::class, 'eerstore'])->name('eer.store');
Route::get('tdee', [CalcController::class, 'tdee'])->name('tdee.index');
Route::post('tdee', [CalcController::class, 'tdeestore'])->name('tdee.store');
Route::get('serat', [CalcController::class, 'serat'])->name('serat.index');
Route::post('serat', [CalcController::class, 'seratstore'])->name('serat.store');
Route::get('protein', [CalcController::class, 'protein'])->name('protein.index');
Route::post('protein', [CalcController::class, 'proteinstore'])->name('protein.store');
Route::get('carb', [CalcController::class, 'carb'])->name('carb.index');
Route::post('carb', [CalcController::class, 'carbstore'])->name('carb.store');
Route::get('bmr', [CalcController::class, 'carb'])->name('bmr.index');
Route::post('bmr', [CalcController::class, 'carbstore'])->name('bmr.store');

// login
Route::middleware('auth')->group(function(){
    // admin
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::get('useradmin', [UserAdminController::class, 'index'])->name('useradmin.index');
    Route::post('useradmin', [UserAdminController::class, 'store'])->name('useradmin.store');
    
    // about
    // Route::resource('aboutadmins', AboutAdmin::class);
    Route::get('aboutadmins', [AboutAdmin::class, 'index'])->name('aboutadmins.index');

    // food Main
    Route::get('food', [FoodController::class, 'index'])->name('food.index');
    Route::post('food', [FoodController::class, 'store'])->name('food.store');
    Route::get('food/{id}/edit', [FoodController::class, 'edit'])->name('food.edit');
    Route::put('food/{id}', [FoodController::class, 'update'])->name('food.update');
    Route::delete('food/{id}', [FoodController::class, 'destroy'])->name('food.destroy');

    // visit
    Route::get('visit', [VisitorController::class, 'index'])->name('visit.index');
    Route::post('visit', [VisitorController::class, 'store'])->name('visit.store');
    Route::get('visit/{id}/edit', [VisitorController::class, 'edit'])->name('visit.edit');
    Route::put('visit/{id}', [VisitorController::class, 'update'])->name('visit.update');
    Route::delete('visit/{id}', [VisitorController::class, 'destroy'])->name('visit.destroy');
    
    // food recomen
    Route::get('foodrecomen', [FoodRecomendationController::class, 'index'])->name('foodrecomend.index');
    Route::post('foodrecomen', [FoodRecomendationController::class, 'store'])->name('foodrecomend.store');
    Route::get('foodrecomen/{id}/edit', [FoodRecomendationController::class, 'edit'])->name('foodrecomend.edit');
    Route::put('foodrecomen/{id}', [FoodRecomendationController::class, 'update'])->name('foodrecomend.update');
    Route::delete('foodrecomen/{id}', [FoodRecomendationController::class, 'destroy'])->name('foodrecomend.destroy');
    
    // food user
    Route::get('fooduser', [FoodUserController::class, 'index'])->name('fooduser.index');
    Route::get('fooduserdetail', [FoodUserController::class, 'detail'])->name('fooduser.detail');
    Route::post('fooduser', [FoodUserController::class, 'store'])->name('fooduser.store');
    Route::get('fooduser/{id}/storeuser', [FoodUserController::class, 'storeuser'])->name('fooduser.storeuser');
    Route::get('fooduser/{id}/edit', [FoodUserController::class, 'edit'])->name('fooduser.edit');
    Route::put('fooduser/{id}', [FoodUserController::class, 'update'])->name('fooduser.update');
    Route::delete('fooduser/{id}', [FoodUserController::class, 'destroy'])->name('fooduser.destroy');
    
    // food menu user
    Route::get('foodmenu', [FoodMenuController::class, 'index'])->name('foodmenu.index');
    Route::get('foodmenufull', [FoodMenuController::class, 'full'])->name('foodmenu.full');
    Route::post('foodmenu', [FoodMenuController::class, 'store'])->name('foodmenu.store');
    Route::post('foodmenutambah', [FoodMenuController::class, 'tambah'])->name('foodmenu.tambah');
    Route::post('foodmenuadded', [FoodMenuController::class, 'add'])->name('foodmenu.add');
    Route::get('foodmenucreate', [FoodMenuController::class, 'create'])->name('foodmenu.create');
    Route::get('foodmenudetail/{id}', [FoodMenuController::class, 'detail'])->name('foodmenu.detail');
    // Route::get('foodmenu/{id}/menu', [FoodMenuController::class, 'menu'])->name('foodmenu.storeuser');
    Route::get('foodmenu/{id}/edit', [FoodMenuController::class, 'edit'])->name('foodmenu.edit');
    Route::put('foodmenu/{id}', [FoodMenuController::class, 'update'])->name('foodmenu.update');
    Route::get('foodmenudelete/{id}', [FoodMenuController::class, 'destroy'])->name('foodmenu.destroy');
    Route::delete('foodmenu/{id}', [FoodMenuController::class, 'hapus'])->name('foodmenu.hapusitem');
    
    // event user
    Route::get('event', [EventController::class, 'index'])->name('event.index');
    Route::post('event', [EventController::class, 'store'])->name('event.store');
    Route::get('event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('event/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
    
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