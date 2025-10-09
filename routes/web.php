<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PublicCrewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TechnologyController; // <- back-office Technologies

/*
|--------------------------------------------------------------------------
| Pages publiques (maquette)
|--------------------------------------------------------------------------
| Accès sans authentification.
*/

// Accueil
Route::view('/', 'pages.home')->name('home');

// Destinations (onglets : moon/mars/europa/titan)
Route::redirect('/destinations', '/destinations/moon')->name('destinations');
Route::get('/destinations/{planet?}', [DestinationsController::class, 'show'])
    ->name('destinations.show');

// Équipage (fallback i18n si BDD vide)
Route::get('/crew', [PublicCrewController::class, 'index'])->name('crew');

// Technologies publiques (version maquette)
Route::view('/technology', 'pages.technology')->name('technology');


/*
|--------------------------------------------------------------------------
| Espace authentifié (Breeze)
|--------------------------------------------------------------------------
| Tableau de bord et profil.
*/

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'pages.home')->name('dashboard');

    Route::get('/profile',  [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Commutateur de langue FR/EN
|--------------------------------------------------------------------------
| Stocké en session, appliqué via App::setLocale().
*/

Route::get('/lang/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['fr','en']), 404);
    Session::put('locale', $locale);
    App::setLocale($locale);
    return back();
})->name('lang.switch');


/*
|--------------------------------------------------------------------------
| Back-office : CRUD Technologies
|--------------------------------------------------------------------------
| Ajoute 'role:Admin|Gestionnaire Technologies' si tu utilises Spatie.
| Exemple : ->middleware(['auth','role:Admin|Gestionnaire Technologies'])
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth']) // ajoute le middleware de rôle si dispo
    ->group(function () {
        Route::resource('technologies', TechnologyController::class)
            ->except(['show']); // pas de show côté back
    });


