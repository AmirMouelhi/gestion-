<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
     return view('welcome');
 });


 Route::get('/Etudiants', [EtudiantController::class, 'index'])->name('Etudiants.index');
 Route::get('/Etudiants/create', [EtudiantController::class, 'create'])->name('Etudiants.create');
 Route::post('/Etudiants', [EtudiantController::class, 'store'])->name('Etudiants.store');
 Route::get('/Etudiants/{nce}', [EtudiantController::class, 'show'])->name('Etudiants.show'); 
 Route::delete('/Etudiants/{nce}', [EtudiantController::class, 'destroy'])->name('Etudiants.delete'); 
 



Route::get('/inscriptions', [InscriptionController::class, 'index'])->name('inscriptions.index');
Route::get('/inscriptions/create', [InscriptionController::class, 'create'])->name('inscriptions.create');
Route::post('/inscriptions', [InscriptionController::class, 'store'])->name('inscriptions.store');
Route::get('/inscriptions/{nce}', [InscriptionController::class, 'show'])->name('inscriptions.show');
Route::delete('/inscriptions/{nce}', [InscriptionController::class, 'destroy'])->name('inscriptions.delete');



Route::get('/matieres',[MatiereController::class,'index'])->name('matieres.index');
Route::get('/matieres/create',[MatiereController::class,'create'])->name('matieres.create');
Route::post('/matieres',[MatiereController::class,'store'])->name('matieres.store');
Route::get('/matieres/{codeMat}',[MatiereController::class,'show'])->name('matieres.show');
Route::delete('/matieres/{codeMat}',[MatiereController::class,'destroy'])->name('matieres.delete');


Route::get('/notes',[NoteController::class,'index'])->name('notes.index');
Route::get('/notes/create',[NoteController::class,'create'])->name('notes.create');
Route::post('/notes',[NoteController::class,'sotre'])->name('notes.store');
Route::get('/notes/{nce}',[NoteController::class,'show'])->name('notes.show');
Route::delete('/notes/{nce}',[NoteController::class,'destroy'])->name('notes.delete');


Route::get('/villes', [VilleController::class, 'index'])->name('villes.index');
Route::get('/villes/create', [VilleController::class, 'create'])->name('villes.create');
Route::post('/villes', [VilleController::class, 'store'])->name('villes.store');
Route::get('/villes/{cpVilles}', [VilleController::class, 'show'])->name('villes.show');
Route::delete('/villes/{cpVilles}', [VilleController::class, 'destroy'])->name('villes.delete');



Route::get('/specialites',[SpecialiteController::class,'index'])->name('specialites.index');
Route::get('/specialites/craete',[SpecialiteController::class,'create'])->name('specialites.create');
Route::post('/specialites',[SpecialiteController::class,'store'])->name('specialites.store');
Route::get('/specialites/{codeSp}',[SpecialiteController::class,'show'])->name('specialites.show');
Route::delete('/specialites/{codeSp}',[SpecialiteController::class,'destroy'])->name('specialites.delete');


