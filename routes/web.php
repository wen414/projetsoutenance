<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\AffectationController;

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

Route::get('/demande', [DemandeController::class, 'create'])->name('demande.create');
Route::post('/demande', [DemandeController::class, 'store'])->name('demande.store');

Route::get('/dpaf/dashboard', [AffectationController::class, 'index'])->name('dpaf.dashboard');
Route::post('/dpaf/affecter/{demandeId}', [AffectationController::class, 'affecter'])->name('affectation.affecter');
Route::post('/dpaf/affecter-multiple', [AffectationController::class, 'affecterMultiple'])->name('affectation.affecterMultiple');

Route::get('/dpaf/demandes', function () {
    $demandes = \App\Models\Demande::all(); // Récupérer toutes les demandes
    return view('DPAF.demandes', compact('demandes'));
})->name('dpaf.demandes');

Route::get('/chef-service/dashboard', function () {
    return view('chef_service.dashboard');
})->name('chef_service.dashboard');

Route::get('/c-srhds/dashboard', function () {
    return view('C_SRHDS.dashboard');
})->name('c_srhds.dashboard');

Route::get('/c-srhds/demandes', function () {
    return view('C_SRHDS.demandes');
})->name('c_srhds.demandes');

Route::get('/directeur/dashboard', function () {
    return view('Directeur.dashboard');
})->name('directeur.dashboard');
