<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormulaireController;


// Page d'acceuil avec le formulaire
Route::get('/', [FormulaireController::class, 'showForm']);

// Récupère les données de la convention et de l'étudiant
Route::get('/getData', [FormulaireController::class, 'getData']);

// Insère l'attestion dans la BDD
Route::post('/submitForm', [FormulaireController::class, 'submitForm'])->name("submitForm");

// Récupère les données de la table attestions
Route::get('/attestations', [FormulaireController::class, 'attestations']);
Route::get('/attestations/{id}', [FormulaireController::class, 'attestationsEtudiant']);

// Récupère les données de la table etudiants
Route::get('/etudiants', [FormulaireController::class, 'etudiants']);
Route::get('/etudiants/{id}', [FormulaireController::class, 'etudiant']);

// Récupère les données de la table conventions
Route::get('/conventions', [FormulaireController::class, 'conventions']);
Route::get('/conventions/{id}', [FormulaireController::class, 'convention']);
Route::get('/conventions/{id}/etudiants', [FormulaireController::class, 'conventionEtudiants']);