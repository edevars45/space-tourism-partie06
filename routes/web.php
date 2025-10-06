<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationsController;

/*
|--------------------------------------------------------------------------
| ROUTES WEB - Space Tourism (Partie 04)
|--------------------------------------------------------------------------
| Ce fichier contient toutes les routes accessibles depuis le navigateur.
| Chaque route renvoie une page (vue) ou un contrôleur.
| Le middleware "auth" protège les pages réservées aux utilisateurs connectés.
|
| Middleware actif : SetLocale -> gère la langue FR/EN via la session.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| PAGE D’ACCUEIL
|--------------------------------------------------------------------------
| Redirection depuis la racine (127.0.0.1:8000) vers /dashboard.
| La page d’accueil (dashboard) affiche le contenu principal du site.
*/
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('pages.home');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PAGE DESTINATIONS
|--------------------------------------------------------------------------
| Affiche la liste et les détails des destinations (planètes).
| Contrôleur : DestinationsController
| Vue : resources/views/pages/destinations.blade.php
*/
Route::get('/destinations', [DestinationsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('destinations');

Route::get('/destinations/{planet}', [DestinationsController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('destinations.show');

/*
|--------------------------------------------------------------------------
| PAGE CREW (ÉQUIPAGE)
|--------------------------------------------------------------------------
| Affiche les membres de l’équipage.
| Vue : resources/views/pages/crew.blade.php
*/
Route::get('/crew', function () {
    return view('pages.crew');
})->middleware(['auth', 'verified'])->name('crew');

/*
|--------------------------------------------------------------------------
| PAGE TECHNOLOGY
|--------------------------------------------------------------------------
| Affiche les informations sur les technologies spatiales.
| Vue : resources/views/pages/technology.blade.php
*/
Route::get('/technology', function () {
    return view('pages.technology');
})->middleware(['auth', 'verified'])->name('technology');

/*
|--------------------------------------------------------------------------
| PROFIL UTILISATEUR (Laravel Breeze)
|--------------------------------------------------------------------------
| Permet de gérer le profil, le mot de passe et la suppression du compte.
| Contrôleur : ProfileController
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTHENTIFICATION (Breeze)
|--------------------------------------------------------------------------
| Gère les routes d’authentification : login, register, logout, etc.
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| CHANGEMENT DE LANGUE (FR / EN)
|--------------------------------------------------------------------------
| Permet de basculer entre les langues via /lang/fr ou /lang/en.
| Ex : <a href="{{ route('lang.switch', 'fr') }}">FR</a>
| Middleware SetLocale applique la langue choisie à chaque page.
*/
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['fr', 'en'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return back();
})->name('lang.switch');
