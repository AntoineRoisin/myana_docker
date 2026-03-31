<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/sl/{shot_url}', [App\Http\Controllers\ShortUrlController::class, 'redirect'])->name('redirect');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('shorturl/{shorturl}', [App\Http\Controllers\ShortUrlController::class, 'update'])->name('shorturl.updateCustom');
    Route::get('shorturl/delete/{shorturl}', [App\Http\Controllers\ShortUrlController::class, 'destroy'])->name('shorturl.destroyCustom');
    Route::resource('shorturl', App\Http\Controllers\ShortUrlController::class);
});
