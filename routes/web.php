<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LangController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/destinations', [PageController::class, 'destinations'])->name('destinations');
Route::get('/crew', [PageController::class, 'crew'])->name('crew');
Route::get('/technology', [PageController::class, 'technology'])->name('technology');
Route::get('/lang/{locale}', [LangController::class, 'switch'])->name('lang.switch');
