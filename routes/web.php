<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Resource Routes with middleware
Route::middleware(['auth'])->group(function () {
    
    // Etudiants Routes
    Route::resource('etudiants', EtudiantController::class)->parameters([
        'etudiants' => 'nce'
    ])->names([
        'index' => 'Etudiants.index',
        'create' => 'Etudiants.create',
        'store' => 'Etudiants.store',
        'show' => 'Etudiants.show',
        'edit' => 'Etudiants.edit',
        'update' => 'Etudiants.update',
        'destroy' => 'Etudiants.delete',
    ]);

    Route::resource('inscriptions', InscriptionController::class)->parameters([
        'inscriptions' => 'id'
    ]);

    // Matieres Routes
    Route::resource('matieres', MatiereController::class)->parameters([
        'matieres' => 'codeMat'
    ]);

    // Notes Routes
    Route::resource('notes', NoteController::class)->parameters([
        'notes' => 'id'
    ]);

    // Specialites Routes
    Route::resource('specialites', SpecialiteController::class)->parameters([
        'specialites' => 'codeSp'
    ]);

    Route::resource('villes', VilleController::class)->parameters([
        'villes' => 'cpVilles'
    ]);
});
