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

/* Route::get('/', function () {
    return view('guest.home');
})->name('home');
 */
Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'PageController@dashboard')->name('dashboard');
        Route::get('/posts/slug', 'PostController@slug')->name('posts.slug');
        Route::get('/categories/slug', 'CategoryController@slug')->name('categories.slug');
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::resource('tags', 'TagController');
});

// Route::get('/categories/{category}', 'CategoryController@slug')->name('categories.slug');

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*')->name('guest.home');
