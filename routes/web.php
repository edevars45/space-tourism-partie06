<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LangController;

// Page d'accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// Pages statiques
Route::get('/destinations', [PageController::class, 'destinations'])->name('destinations');
Route::get('/crew', [PageController::class, 'crew'])->name('crew');
Route::get('/technology', [PageController::class, 'technology'])->name('technology');

// Commutateur de langue
Route::get('/lang/{locale}', [LangController::class, 'switch'])->name('lang.switch');
