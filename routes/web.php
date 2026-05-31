<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('front.home');
Route::get('/news', [SiteController::class, 'news'])->name('front.news.index');
Route::get('/news/{slug}', [SiteController::class, 'showArticle'])->name('front.news.show');
Route::get('/category/{slug}', [SiteController::class, 'category'])->name('front.category');
Route::get('/about', [SiteController::class, 'about'])->name('front.about');
Route::get('/contact', [SiteController::class, 'contact'])->name('front.contact');

Auth::routes();

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('articles', ArticleController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::redirect('/admin', '/admin/dashboard');
Route::get('/home', [DashboardController::class, 'index'])->name('home');
