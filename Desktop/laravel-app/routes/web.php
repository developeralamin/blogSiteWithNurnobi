<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
// Auth section
Route::get('login', [LoginController::class, 'loginForm']);
Route::get('registration', [RegistrationController::class, 'registerForm']);
Route::post('registration', [RegistrationController::class, 'register'])->name('register-submit');

//Admin section
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, "dashboard"]);
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
});
