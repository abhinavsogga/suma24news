<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminNotificationController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ContentController;
use App\Http\Controllers\Front\LikeDislikeController;
use App\Http\Controllers\UserVisitController;

// Admin
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/users', UserController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/pages', PageController::class);
    Route::resource('/photo-gallery', PhotoGalleryController::class);
    Route::resource('/video-gallery', VideoGalleryController::class);

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

    Route::delete('/notifications/{notification}', [AdminNotificationController::class, 'delete'])->name('notifications.delete');
    Route::post('/notifications/{notification}/mark-as-read', [AdminNotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');

});

Route::post('/news/{news}/like-dislike', [LikeDislikeController::class, 'likeDislike'])->name('news.like-dislike')->middleware(['auth']);


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
    Route::get('/categories/{category}', 'listNews')->name('content.listNews')->middleware('track_user_visits');
    Route::get('/news/{slug}', 'showNewsDetails')->name('content.newsDetails')->middleware('track_user_visits');
    Route::post('/log-time-spent', [UserVisitController::class, 'logTimeSpent']);
    Route::get('/pages/{slug}', 'showPage')->name('content.page');
});

// front
Route::get('/', [HomeController::class, 'index'])->name('home');

