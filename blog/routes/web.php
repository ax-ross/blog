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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class);
    Route::resource('tags', \App\Http\Controllers\Admin\TagsController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostsController::class);
});
Auth::routes();
