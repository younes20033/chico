<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;





// Routes principales
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

// Routes d'authentification
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
});

// Routes authentifiées
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard - CORRECTION IMPORTANTE
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    // Profil
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    
    // Mot de passe
    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('password.change');
    Route::put('/change-password', [AuthController::class, 'updatePassword'])->name('password.update');
    
    // Devis
    Route::get('/devis-history', [DevisController::class, 'history'])->name('devis.history');
    Route::get('/devis/{id}', [DevisController::class, 'show'])->name('devis.show');
    Route::get('/devis/{id}/download', [DevisController::class, 'downloadPDF'])->name('devis.download');
    Route::put('/devis/{id}/status', [DevisController::class, 'updateStatus'])->name('devis.update-status');
    
    // Suivi en temps réel
    Route::get('/real-time', function () {
        return view('dashboard.real-time');
    })->name('real.time');
});



// Routes Admin - CORRECTIONS IMPORTANTES
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Gestion des utilisateurs
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    
    // Gestion des devis
    Route::get('/devis', [AdminController::class, 'devis'])->name('devis');
    Route::get('/devis/new', [AdminController::class, 'newDevis'])->name('devis.new');
    Route::post('/devis/{id}/approve', [AdminController::class, 'approveDevis'])->name('devis.approve');
    Route::post('/devis/{id}/reject', [AdminController::class, 'rejectDevis'])->name('devis.reject');
    
    // Gestion des notifications
    Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications');
    Route::post('/notifications/{id}/read', [AdminController::class, 'markNotificationAsRead'])->name('notifications.read');
    Route::post('/notifications/mark-all-read', [AdminController::class, 'markAllNotificationsAsRead'])->name('notifications.mark-all-read');
});

Route::get('/debug-routes', function () {
    return response()->json(Route::getRoutes()->getRoutes());
})->middleware('auth');



