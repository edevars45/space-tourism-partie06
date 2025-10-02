<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\DestinationsController;

// Page d’accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// Pages statiques
Route::get('/destinations', [DestinationsController::class, 'index'])->name('destinations');
Route::get('/crew', [PageController::class, 'crew'])->name('crew');
Route::get('/technology', [PageController::class, 'technology'])->name('technology');

// Commutateur de langue
Route::get('/lang/{locale}', [LangController::class, 'switch'])->name('lang.switch');

// Une page par planète
Route::get('/destinations/{planet}', [DestinationsController::class, 'show'])->name('destinations.show');
