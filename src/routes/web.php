<?php

use App\Http\Controllers\DemoAiController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('demo.home');
});

Route::get('/locale/{locale}', function (Request $request, string $locale): RedirectResponse {
    $supportedLocales = array_keys(config('app.supported_locales', []));

    abort_unless(in_array($locale, $supportedLocales, true), 404);

    $request->session()->put('locale', $locale);

    return redirect()->back();
})->name('locale.switch');

Route::prefix('demo')->name('demo.')->group(function () {
    Route::view('/', 'demo.home')->name('home');
    Route::view('/about', 'demo.about')->name('about');
    Route::get('/ai', [DemoAiController::class, 'show'])->name('ai');
    Route::post('/ai', [DemoAiController::class, 'store'])->name('ai.store');
    Route::view('/services', 'demo.services')->name('services');
    Route::view('/contact', 'demo.contact')->name('contact');
});
