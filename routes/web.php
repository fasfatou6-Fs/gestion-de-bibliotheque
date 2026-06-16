<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivresController; // Étape 1 : On importe ton contrôleur de livres
use App\Http\Controllers\EmpruntController; // Étape 1 : On importe ton contrôleur d'emprunts

use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

//  Dashboard existant (protégé par auth et verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Toutes les routes protégées par authentification
Route::middleware('auth')->group(function () {
    // Les routes pour la gestion du profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Les routes pour la gestion des livres
    // Cette seule ligne génère automatiquement les routes pour index, create, store, edit, update, destroy
    Route::resource('livres', LivresController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/emprunts', [EmpruntController::class, 'index'])->name('emprunts.index');
    Route::get('/emprunts/creer', [EmpruntController::class, 'create'])->name('emprunts.create');
    Route::post('/emprunts', [EmpruntController::class, 'store'])->name('emprunts.store');

    // marquer un livre comme rendu
    Route::patch('/emprunts/{emprunt}/rendre', [EmpruntController::class, 'marquerCommeRendu'])->name('emprunts.rendre');
});

// L'authentification par défaut de Laravel (Laravel Breeze, Jetstream, etc.)
require __DIR__.'/auth.php';
