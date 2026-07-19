<?php

use App\Http\Controllers\DemoAiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('demo.home');
});

Route::prefix('demo')->name('demo.')->group(function () {
    Route::view('/', 'demo.home')->name('home');
    Route::view('/about', 'demo.about')->name('about');
    Route::get('/ai', [DemoAiController::class, 'show'])->name('ai');
    Route::post('/ai', [DemoAiController::class, 'store'])->name('ai.store');
    Route::view('/services', 'demo.services')->name('services');
    Route::view('/contact', 'demo.contact')->name('contact');
});
