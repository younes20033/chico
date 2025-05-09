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
