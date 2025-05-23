<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait AdminAccess
{
    /**
     * Vérifier si l'utilisateur connecté est un administrateur
     * 
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    protected function checkAdminAccess()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Accès non autorisé. Vous devez être administrateur.');
        }
        return true;
    }

    /**
     * Vérifier l'accès admin et retourner une réponse si échec
     * 
     * @return \Illuminate\Http\RedirectResponse|null
     */
    protected function requireAdminAccess()
    {
        $accessCheck = $this->checkAdminAccess();
        if ($accessCheck !== true) {
            return $accessCheck;
        }
        return null;
    }
}