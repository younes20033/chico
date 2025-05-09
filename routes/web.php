<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DevisController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/partenaire', function () {
    return view('partenaire');
})->name('partenaire');

Route::get('/contactez-nous', function () {
    return view('contactez-nous');
})->name('contactez-nous');

Route::get('/qui-sommes-nous', function () {
    return view('qui-sommes-nous');
})->name('qui-sommes-nous');

// Routes de devis accessibles à tous
Route::get('/devis', [DevisController::class, 'index'])->name('devis.form');
Route::post('/devis/generate', [DevisController::class, 'generatePDF'])->name('devis.generate');

Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('dashboard');
    
    // Profil
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\AuthController::class, 'updateProfile'])->name('profile.update');
    
    // Mot de passe
    Route::get('/change-password', [App\Http\Controllers\AuthController::class, 'showChangePasswordForm'])->name('password.change');
    Route::put('/change-password', [App\Http\Controllers\AuthController::class, 'updatePassword'])->name('password.update');
    
    // Historique des devis
    Route::get('/devis-history', function () {
        return view('dashboard.devis-history');
    })->name('devis.history');
    
    // Suivi en temps réel
    Route::get('/real-time', function () {
        return view('dashboard.real-time');
    })->name('real.time');
});

// Routes Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    
    // Gestion des utilisateurs
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::get('/users/create', [App\Http\Controllers\AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('users.destroy');
});
// Routes d'authentification
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('dashboard');
    
    // Profil
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\AuthController::class, 'updateProfile'])->name('profile.update');
    
    // Mot de passe
    Route::get('/change-password', [App\Http\Controllers\AuthController::class, 'showChangePasswordForm'])->name('password.change');
    Route::put('/change-password', [App\Http\Controllers\AuthController::class, 'updatePassword'])->name('password.update');
    
    // Historique des devis
    Route::get('/devis-history', function () {
        return view('dashboard.devis-history');
    })->name('devis.history');
    
    // Suivi en temps réel
    Route::get('/real-time', function () {
        return view('dashboard.real-time');
    })->name('real.time');
});
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [App\Http\Controllers\AuthController::class, 'showForgotPasswordForm'])
        ->name('password.request');
    Route::post('/forgot-password', [App\Http\Controllers\AuthController::class, 'sendResetLinkEmail'])
        ->name('password.email');
    Route::get('/reset-password/{token}', [App\Http\Controllers\AuthController::class, 'showResetPasswordForm'])
        ->name('password.reset');
    Route::post('/reset-password', [App\Http\Controllers\AuthController::class, 'resetPassword'])
        ->name('password.update');
});