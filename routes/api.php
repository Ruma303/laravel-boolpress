<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */
Route::get('/posts',        'Api\PostController@index') ->name('posts.index');
Route::get('/posts/random', 'Api\PostController@random')->name('posts.random');
Route::get('/posts/{slug}', 'Api\PostController@show')  ->name('posts.show');
Route::post('/leads', 'Api\LeadController@store')       ->name('leads.store');
