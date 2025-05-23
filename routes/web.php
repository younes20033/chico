<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleAuthController;
use App\Http\Controllers\SimpleAdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\PartnerController;

// Routes principales
Route::get('/', function () {
    return view('welcome');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services');

// Route pour la page partenaire (GET)
Route::get('/partenaire', [PartnerController::class, 'index'])->name('partenaire');

// Route pour soumettre la candidature partenaire (POST) - AJOUTÉE
Route::post('/partenaire/submit', [PartnerController::class, 'submitApplication'])->name('partner.submit');

Route::get('/contactez-nous', function () {
    return view('contactez-nous');
})->name('contactez-nous');
Route::get('/qui-sommes-nous', function () {
    return view('qui-sommes-nous');
})->name('qui-sommes-nous');

// Routes de devis (ACCESSIBLES À TOUS)
Route::get('/devis', [DevisController::class, 'index'])->name('devis.form');
Route::post('/devis/generate', [DevisController::class, 'generatePDF'])->name('devis.generate');

// AUTHENTIFICATION SIMPLE
Route::get('/login', [SimpleAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [SimpleAuthController::class, 'login']);
Route::get('/register', [SimpleAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [SimpleAuthController::class, 'register']);
Route::post('/logout', [SimpleAuthController::class, 'logout'])->name('logout');

// Routes de mot de passe
Route::get('/forgot-password', [SimpleAuthController::class, 'showForgotPassword'])->name('password.request');

// Routes protégées - CLIENT (contrôle dans les méthodes)
Route::get('/dashboard', [SimpleAuthController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [SimpleAuthController::class, 'profile'])->name('profile');
Route::put('/profile', [SimpleAuthController::class, 'updateProfile'])->name('profile.update');
Route::get('/change-password', [SimpleAuthController::class, 'showChangePassword'])->name('password.change');
Route::put('/change-password', [SimpleAuthController::class, 'changePassword'])->name('password.update');
Route::get('/devis-history', [SimpleAuthController::class, 'myDevis'])->name('devis.history');
Route::get('/devis/{id}/details', [SimpleAuthController::class, 'showMyDevis'])->name('devis.show');
Route::get('/devis/{id}/download', [DevisController::class, 'downloadPDF'])->name('devis.download');
Route::get('/real-time', function () {
    return view('dashboard.real-time');
})->name('real.time');

// Routes Admin - SANS MIDDLEWARE (contrôle dans SimpleAdminController)
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/', [SimpleAdminController::class, 'dashboard'])->name('dashboard');
    
    // Gestion des utilisateurs
    Route::get('/users', [SimpleAdminController::class, 'users'])->name('users');
    Route::get('/users/create', [SimpleAdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [SimpleAdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [SimpleAdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [SimpleAdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [SimpleAdminController::class, 'destroyUser'])->name('users.destroy');
    
    // Gestion des devis
    Route::get('/devis', [SimpleAdminController::class, 'devis'])->name('devis');
    Route::get('/devis/new', [SimpleAdminController::class, 'newDevis'])->name('devis.new');
    Route::get('/devis/{id}/details', [SimpleAdminController::class, 'showDevis'])->name('devis.show');
    Route::post('/devis/{id}/approve', [SimpleAdminController::class, 'approveDevis'])->name('devis.approve');
    Route::post('/devis/{id}/reject', [SimpleAdminController::class, 'rejectDevis'])->name('devis.reject');
    Route::put('/devis/{id}/status', [SimpleAdminController::class, 'updateDevisStatus'])->name('devis.update-status');
    
    // Gestion des candidatures partenaires - AJOUTÉES
    Route::get('/partners', [SimpleAdminController::class, 'partners'])->name('partners');
    Route::get('/partners/{id}/show', [SimpleAdminController::class, 'showPartner'])->name('partners.show');
    Route::put('/partners/{id}/status', [SimpleAdminController::class, 'updatePartnerStatus'])->name('partners.update-status');
    
    // Gestion des notifications
    Route::get('/notifications', [SimpleAdminController::class, 'notifications'])->name('notifications');
    Route::post('/notifications/{id}/read', [SimpleAdminController::class, 'markNotificationAsRead'])->name('notifications.read');
    Route::post('/notifications/mark-all-read', [SimpleAdminController::class, 'markAllNotificationsAsRead'])->name('notifications.mark-all-read');
});