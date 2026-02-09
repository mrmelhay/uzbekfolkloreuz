<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Placeholder for CRUD routes
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class);
        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
        Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
        Route::resource('home_sections', \App\Http\Controllers\Admin\HomeSectionController::class);
        Route::resource('media', \App\Http\Controllers\Admin\MediaController::class)->except(['show', 'edit', 'update']);

        // Profile routes
        Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::put('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');
    });
});

// Frontend Routes
// Frontend Routes

// 1. Localized Routes (explicitly needing a valid locale prefix)
Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'set.locale'], function () {
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home.localized');
    Route::get('/category/{slug}', [App\Http\Controllers\Frontend\CategoryController::class, 'show'])->name('category.show.localized');
    Route::get('/article/{slug}', [App\Http\Controllers\Frontend\ArticleController::class, 'show'])->name('article.show.localized');
    Route::get('/page/{slug}', [App\Http\Controllers\Frontend\PageController::class, 'show'])->name('page.show.localized');
});

// 2. Default Routes (fallback for no locale, defaults to 'uz' via middleware or just implicit)
// We use the 'set.locale' middleware here too if it handles setting default locale when none is present.
// Generally, 'set.locale' might expect a route parameter. If it does, we might need a different middleware or pass default.
// Assuming 'set.locale' handles missing parameter gracefully or we don't use it here if we just want default behavior.
Route::middleware('set.locale')->group(function () {
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
    Route::get('/category/{slug}', [App\Http\Controllers\Frontend\CategoryController::class, 'show'])->name('category.show');
    Route::get('/article/{slug}', [App\Http\Controllers\Frontend\ArticleController::class, 'show'])->name('article.show');
    Route::get('/page/{slug}', [App\Http\Controllers\Frontend\PageController::class, 'show'])->name('page.show');
});

// Redirect root to default locale if needed, or handle in middleware
