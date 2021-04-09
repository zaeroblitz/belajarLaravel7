<?php

use Illuminate\Support\Facades\Route;

Route::get('', 'HomeController');

Route::view('about', 'about');
Route::view('contact', 'contact');