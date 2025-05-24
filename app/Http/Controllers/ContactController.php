<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('contactez-nous');
    }

    public function submitContact(Request $request)
    {
        // Validation simple
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être valide.',
            'subject.required' => 'Le sujet est obligatoire.',
            'message.required' => 'Le message est obligatoire.',
        ]);

        try {
            // Créer le message email simple
            $emailContent = "
NOUVEAU MESSAGE DE CONTACT - CHICO TRANS

Nom: " . $request->name . "
Email: " . $request->email . "
Téléphone: " . ($request->phone ?: 'Non fourni') . "
Sujet: " . $request->subject . "
Date: " . date('d/m/Y à H:i') . "

Message:
" . $request->message . "

---
Email envoyé automatiquement depuis le site CHICO TRANS
            ";

            // Envoyer l'email directement
            Mail::raw($emailContent, function ($message) use ($request) {
                $message->to('asmaaamhloud3@gmail.com')
                        ->subject('Contact: ' . $request->subject)
                        ->replyTo($request->email, $request->name);
            });

            return back()->with('success', 'Votre message a été envoyé avec succès !');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erreur: ' . $e->getMessage());
        }
    }
}