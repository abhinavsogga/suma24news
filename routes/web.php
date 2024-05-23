<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ContentController;

// dashboard
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/categories', CategoryController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/pages', PageController::class);

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
});

// authentication
Route::middleware(['guest'])->prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('reset-password');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::controller(ContentController::class)->group(function () {
    Route::get('/categories/{category}', 'listNews')->name('content.listNews');
    Route::post('/news/{news}', 'newsDetails')->name('content.newsDetails');
    Route::post('/pages/{page}', 'showPage')->name('content.page');
});

// front
Route::get('/', [HomeController::class, 'index'])->name('home');