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
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('personal')->name('personal.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Personal\IndexController::class, 'index'])->name('index');
        Route::get('liked-posts', [\App\Http\Controllers\Personal\LikedPostController::class, 'index'])->name('liked-posts.index');
        Route::prefix('liked-posts')->name('liked-posts.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Personal\LikedPostController::class, 'index'])->name('index');
            Route::delete('/{post}', [\App\Http\Controllers\Personal\LikedPostController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('comments')->resource('comments', \App\Http\Controllers\Personal\CommentController::class)->except(['create', 'store']);
    });

    Route::post('{post}/comments', [\App\Http\Controllers\PostCommentController::class, 'store'])->name('posts.comments.store');
    Route::post('{post}/likes', [\App\Http\Controllers\PostLikeController::class, 'store'])->name('posts.likes.store');

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
});

Auth::routes(['verify' => true]);
