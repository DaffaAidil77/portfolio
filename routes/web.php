<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\questionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;


Route::get('/', [homeController::class, 'index']);
Route::post('question/store', [questionController::class, 'store'])->name('question.store');
Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::resource('pelanggan', PelangganController::class);
Route::resource('works', WorkController::class)->only(['store', 'update', 'destroy']);
Route::resource('experiences', ExperienceController::class)->only(['store', 'update', 'destroy']);
Route::put('profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');