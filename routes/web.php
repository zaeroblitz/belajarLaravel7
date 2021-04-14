<?php

use Illuminate\Support\Facades\Route;

Route::get('', 'HomeController');

Route::get('/posts', 'PostController@index');

Route::get('/posts/show/{post:slug}', 'PostController@show');

Route::get('/posts/create', 'PostController@create');
Route::post('/posts/store', 'PostController@store');

Route::get('/posts/{post:slug}/edit', 'PostController@edit');
Route::patch('/posts/{post:slug}/edit', 'PostController@update');

Route::delete('/posts/{post:slug}/delete', 'PostController@destroy');

Route::get('/posts/{post:slug}', 'PostController@show');

Route::get('/categories/{category:slug}', 'CategoryController@show');

Route::get('/tags/{tag:slug}', 'TagController@show');

Route::view('/about', 'about');
Route::view('/contact', 'contact');
