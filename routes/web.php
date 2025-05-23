<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleAuthController;
use App\Http\Controllers\SimpleAdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DevisController;

// Routes principales (INCHANGÉES)
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

// Routes de devis (INCHANGÉES)
Route::get('/devis', [DevisController::class, 'index'])->name('devis.form');
Route::post('/devis/generate', [DevisController::class, 'generatePDF'])->name('devis.generate');

// NOUVEAU SYSTÈME D'AUTHENTIFICATION (vues simples)
Route::get('/login', [SimpleAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [SimpleAuthController::class, 'login']);
Route::get('/register', [SimpleAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [SimpleAuthController::class, 'register']);
Route::post('/logout', [SimpleAuthController::class, 'logout'])->name('logout');

// Routes de mot de passe
Route::get('/forgot-password', [SimpleAuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [SimpleAuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [SimpleAuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [SimpleAuthController::class, 'resetPassword'])->name('password.update');

// Routes protégées - UTILISENT VOS VUES EXISTANTES
Route::middleware('auth')->group(function () {
    // Dashboard utilisateur - utilise dashboard.index (VOTRE VUE)
    Route::get('/dashboard', [SimpleAuthController::class, 'dashboard'])->name('dashboard');
    
    // Profil - utilise dashboard.profile (VOTRE VUE)
    Route::get('/profile', [SimpleAuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [SimpleAuthController::class, 'updateProfile'])->name('profile.update');
    
    // Changement de mot de passe - utilise dashboard.change-password (VOTRE VUE)
    Route::get('/change-password', [SimpleAuthController::class, 'showChangePassword'])->name('password.change');
    Route::put('/change-password', [SimpleAuthController::class, 'changePassword'])->name('password.update');
    
    // Devis utilisateur - utilise dashboard.devis-history (VOTRE VUE)
    Route::get('/devis-history', [SimpleAuthController::class, 'myDevis'])->name('devis.history');
    Route::get('/devis/{id}', [DevisController::class, 'show'])->name('devis.show');
    Route::get('/devis/{id}/download', [DevisController::class, 'downloadPDF'])->name('devis.download');
    Route::put('/devis/{id}/status', [DevisController::class, 'updateStatus'])->name('devis.update-status');
    
    // Suivi en temps réel - utilise dashboard.real-time (VOTRE VUE)
    Route::get('/real-time', function () {
        return view('dashboard.real-time');
    })->name('real.time');
});

// Routes Admin - UTILISENT VOS VUES EXISTANTES
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin - utilise admin.dashboard (VOTRE VUE)
    Route::get('/', [SimpleAdminController::class, 'dashboard'])->name('dashboard');
    
    // Gestion des utilisateurs - utilisent admin.users.* (VOS VUES)
    Route::get('/users', [SimpleAdminController::class, 'users'])->name('users');
    Route::get('/users/create', [SimpleAdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [SimpleAdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [SimpleAdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [SimpleAdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [SimpleAdminController::class, 'destroyUser'])->name('users.destroy');
    
    // Gestion des devis - utilisent admin.devis.* (VOS VUES)
    Route::get('/devis', [SimpleAdminController::class, 'devis'])->name('devis');
    Route::get('/devis/new', [SimpleAdminController::class, 'newDevis'])->name('devis.new');
    Route::post('/devis/{id}/approve', [SimpleAdminController::class, 'approveDevis'])->name('devis.approve');
    Route::post('/devis/{id}/reject', [SimpleAdminController::class, 'rejectDevis'])->name('devis.reject');
    
    // Gestion des notifications - utilise admin.notifications (VOTRE VUE)
    Route::get('/notifications', [SimpleAdminController::class, 'notifications'])->name('notifications');
    Route::post('/notifications/{id}/read', [SimpleAdminController::class, 'markNotificationAsRead'])->name('notifications.read');
    Route::post('/notifications/mark-all-read', [SimpleAdminController::class, 'markAllNotificationsAsRead'])->name('notifications.mark-all-read');
});