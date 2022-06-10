<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index.page');

Route::middleware(['auth', 'verified'])->prefix('personal')->name('personal.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Personal\IndexController::class, 'index'])->name('index');
    Route::get('liked-posts', [\App\Http\Controllers\Personal\LikedPostsController::class, 'index'])->name('liked-posts.index');
    Route::prefix('liked-posts')->name('liked-posts.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Personal\LikedPostsController::class, 'index'])->name('index');
        Route::delete('/{post}', [\App\Http\Controllers\Personal\LikedPostsController::class, 'destroy'])->name('destroy');
    });
    Route::get('user-comments', [\App\Http\Controllers\Personal\UserCommentsController::class, 'index'])->name('user-comments.index');
});

Route::middleware(['auth', 'admin', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class);
    Route::resource('tags', \App\Http\Controllers\Admin\TagsController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostsController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UsersController::class);
});
Auth::routes(['verify' => true]);
