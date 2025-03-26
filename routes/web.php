<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\RapportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');

Route::get('/admin/demandes', [DemandeController::class, 'index'])->name('admin.demandes');
Route::get('/admin/stagiaires', [StagiaireController::class, 'index'])->name('admin.stagiaires');
Route::get('/admin/rapports', [RapportController::class, 'index'])->name('admin.rapports');
