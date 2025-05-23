<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PartnerController extends Controller
{
    /**
     * Afficher la page devenir partenaire
     */
    public function index()
    {
        return view('partenaire');
    }

    /**
     * Traiter le formulaire de candidature partenaire
     */
    public function submitApplication(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'partnership_type' => 'required|string|in:transporteur,agent_commercial,logistique,distributeur,autre',
            'message' => 'required|string|min:50',
            'terms' => 'required|accepted',
        ], [
            'company_name.required' => 'Le nom de l\'entreprise est obligatoire.',
            'activity.required' => 'Le secteur d\'activité est obligatoire.',
            'contact_name.required' => 'Le nom du contact est obligatoire.',
            'position.required' => 'La fonction est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être valide.',
            'phone.required' => 'Le téléphone est obligatoire.',
            'location.required' => 'La ville/pays est obligatoire.',
            'website.url' => 'Le site web doit être une URL valide.',
            'partnership_type.required' => 'Le type de partenariat est obligatoire.',
            'partnership_type.in' => 'Le type de partenariat sélectionné n\'est pas valide.',
            'message.required' => 'Le message est obligatoire.',
            'message.min' => 'Le message doit contenir au moins 50 caractères.',
            'terms.required' => 'Vous devez accepter les conditions.',
            'terms.accepted' => 'Vous devez accepter les conditions.',
        ]);

        try {
            // Sauvegarder la candidature en base de données
            $partner = \App\Models\Partner::create($validated);
            
            // Créer une notification pour l'administrateur
            \App\Models\Notification::create([
                'type' => 'nouvelle_candidature_partenaire',
                'title' => 'Nouvelle candidature de partenariat',
                'message' => "Nouvelle candidature de partenariat reçue de {$validated['contact_name']} ({$validated['company_name']}) pour devenir {$this->getPartnershipTypeLabel($validated['partnership_type'])}.",
                'partner_id' => $partner->id
            ]);
            
            return back()->with('success', 
                'Votre candidature de partenariat a été soumise avec succès ! Notre équipe vous contactera dans les plus brefs délais.');
                
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 
                'Une erreur est survenue lors de l\'envoi de votre candidature. Veuillez réessayer ou nous contacter directement.');
        }
    }

    /**
     * Obtenir le libellé du type de partenariat
     */
    private function getPartnershipTypeLabel($type)
    {
        $types = [
            'transporteur' => 'Transporteur',
            'agent_commercial' => 'Agent commercial',
            'logistique' => 'Prestataire logistique',
            'distributeur' => 'Distributeur',
            'autre' => 'Autre'
        ];

        return $types[$type] ?? $type;
    }

    /**
     * Envoyer un email de notification (version simple)
     */
    private function sendNotificationEmail($data)
    {
        // Email simple sans template complexe
        $subject = "Nouvelle candidature de partenariat - " . $data['company_name'];
        
        $message = "Nouvelle candidature de partenariat reçue :\n\n";
        $message .= "Entreprise : " . $data['company_name'] . "\n";
        $message .= "Activité : " . $data['activity'] . "\n";
        $message .= "Contact : " . $data['contact_name'] . "\n";
        $message .= "Fonction : " . $data['position'] . "\n";
        $message .= "Email : " . $data['email'] . "\n";
        $message .= "Téléphone : " . $data['phone'] . "\n";
        $message .= "Localisation : " . $data['location'] . "\n";
        $message .= "Site web : " . ($data['website'] ?? 'Non renseigné') . "\n";
        $message .= "Type de partenariat : " . $data['partnership_type'] . "\n\n";
        $message .= "Message :\n" . $data['message'] . "\n\n";
        $message .= "Date de soumission : " . now()->format('d/m/Y H:i:s');

        // Utilisez mail() PHP simple ou configurez Laravel Mail selon vos besoins
        $to = 'transport.chicotrans@gmail.com'; // Votre email admin
        $headers = 'From: ' . $data['email'] . "\r\n" .
                   'Reply-To: ' . $data['email'] . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }

    /**
     * Sauvegarder en base de données (optionnel)
     */
    private function savePartnerApplication($data)
    {
        // Si vous créez une table partners, vous pouvez sauvegarder ici
        // Partner::create($data);
    }
}