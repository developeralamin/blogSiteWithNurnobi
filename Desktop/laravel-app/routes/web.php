<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
// Auth section
Route::get('login', [LoginController::class, 'loginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('registration', [RegistrationController::class, 'registerForm']);
Route::post('registration', [RegistrationController::class, 'register'])->name('register-submit');
Route::get('verify-email/{token}', [RegistrationController::class, 'verify']);

//Admin section
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, "dashboard"])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
});

Route::get('log', function () {
    echo "Hello";
    Log::info('Hello from USA');
});
