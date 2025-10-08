<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PublicCrewController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public (maquette)
|--------------------------------------------------------------------------
*/

// Home (URL racine) — vue pages.home
Route::view('/', 'pages.home')->name('home');

// Destinations
Route::redirect('/destinations', '/destinations/moon')->name('destinations');
Route::get('/destinations/{planet?}', [DestinationsController::class, 'show'])
    ->name('destinations.show');

// Crew (équipage) – contrôleur public (fallback i18n ou BDD)
Route::get('/crew', [PublicCrewController::class, 'index'])->name('crew');

// Technology (vue simple)
Route::view('/technology', 'pages.technology')->name('technology');

/*
|--------------------------------------------------------------------------
| Espace authentifié (Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('pages.home'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Lang switch FR/EN
|--------------------------------------------------------------------------
*/
Route::get('/lang/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['fr','en']), 404);
    Session::put('locale', $locale);
    App::setLocale($locale);
    return back();
})->name('lang.switch');
