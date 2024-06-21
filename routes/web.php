<?php

use App\Http\Controllers\ExchangeRatesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Livewire\SendMoney;
use GuzzleHttp\Client;

Route::get('/', function () {
    // Retrieve the country codes

    $countryCodes = Cache::get('country_codes', []);

    return view('welcome',compact('countryCodes'));

})->name('website.home');

Route::get('/exchange-rates', [ExchangeRatesController::class, 'index'])->name('exchange-rates.index');

Route::get('/send-money', SendMoney::class);

//subscription routes post
Route::get('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
//cache country codes
Route::get('/fetch-and-cache-country-codes', [SubscriptionController::class, 'fetchAndCacheCountryCodes'])->name('fetch-and-cache-country-codes');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
