<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('demo.home');
});

Route::prefix('demo')->name('demo.')->group(function () {
    Route::view('/', 'demo.home')->name('home');
    Route::view('/about', 'demo.about')->name('about');
    Route::view('/services', 'demo.services')->name('services');
    Route::view('/contact', 'demo.contact')->name('contact');
});
