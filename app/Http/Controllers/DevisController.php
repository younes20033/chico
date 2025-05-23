<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\DevisTransport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;

class DevisController extends Controller
{
    /**
     * Afficher le formulaire de demande de devis
     */
    public function index()
    {
        return view('devis.form');
    }

    /**
     * Générer le devis PDF et l'enregistrer dans la base de données
     */
    public function generatePDF(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'ice' => 'nullable|string|max:50',
            'transports' => 'required|array|min:1',
            'transports.*.date' => 'required|date',
            'transports.*.destination' => 'required|string|max:255',
            'transports.*.vehicle_type' => 'required|string|max:100',
            'transports.*.price' => 'required|numeric|min:0',
            'transports.*.reference' => 'nullable|string|max:100',
            'transports.*.description' => 'nullable|string',
            'tva_rate' => 'required|numeric|min:0|max:100',
            'special_requirements' => 'nullable|string',
            'terms' => 'required|accepted',
        ]);

        // Générer un numéro de devis unique
        $factureNo = date('Y') . '/' . str_pad(rand(100, 999), 3, '0', STR_PAD_LEFT);

        // Calculer les totaux à partir des données du formulaire
        $totalHT = 0;
        $transports = [];

        foreach ($validated['transports'] as $key => $transportData) {
            // Utiliser le prix saisi dans le formulaire
            $price = $transportData['price'];
            
            $transports[] = [
                'date' => $transportData['date'],
                'destination' => $transportData['destination'],
                'vehicle_type' => $transportData['vehicle_type'],
                'reference' => $transportData['reference'] ?? '',
                'description' => $transportData['description'] ?? '',
                'price' => $price
            ];

            $totalHT += $price;
        }

        // Calculer la TVA avec le taux saisi dans le formulaire
        $tvaRate = $validated['tva_rate'] / 100;
        $totalTVA = round($totalHT * $tvaRate, 2);
        $totalTTC = $totalHT + $totalTVA;

        // Données pour le PDF
        $data = [
            'date' => Carbon::now()->format('d/m/Y'),
            'facture_no' => $factureNo,
            'recipient' => [
                'company' => $validated['company_name'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'postal_code' => $validated['postal_code'] ?? '',
                'ice' => $validated['ice'] ?? '',
            ],
            'transports' => $transports,
            'totalHT' => $totalHT,
            'totalTVA' => $totalTVA,
            'totalTTC' => $totalTTC,
            'total_in_words' => $this->numberToWords($totalTTC)
        ];

        // Générer le PDF
        $pdf = Pdf::loadView('devis.pdf', $data);
        
        // Nommer le fichier PDF
        $filename = 'DEVIS_' . str_replace('/', '_', $factureNo) . '.pdf';
        
        // Si l'utilisateur est connecté, enregistrer le devis dans la base de données
        if (Auth::check()) {
            // Enregistrer le PDF dans le stockage
            $pdfPath = 'devis/' . $filename;
            Storage::disk('public')->put($pdfPath, $pdf->output());
            
            // Créer l'enregistrement de devis
            $devis = Devis::create([
                'user_id' => Auth::id(),
                'company_name' => $validated['company_name'],
                'contact_name' => $validated['contact_name'],
                'email' => $validated['email'],
                'telephone' => $validated['telephone'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'postal_code' => $validated['postal_code'] ?? null,
                'ice' => $validated['ice'] ?? null,
                'reference' => $factureNo,
                'status' => 'pending',
                'pdf_path' => $pdfPath,
                'special_requirements' => $validated['special_requirements'] ?? null,
                'total_ht' => $totalHT,
                'total_tva' => $totalTVA,
                'total_ttc' => $totalTTC,
                'tva_rate' => $validated['tva_rate']
            ]);
            
            // Enregistrer les transports liés au devis
            foreach ($validated['transports'] as $transportData) {
                DevisTransport::create([
                    'devis_id' => $devis->id,
                    'date' => $transportData['date'],
                    'destination' => $transportData['destination'],
                    'vehicle_type' => $transportData['vehicle_type'],
                    'price' => $transportData['price'],
                    'reference' => $transportData['reference'] ?? null,
                    'description' => $transportData['description'] ?? null
                ]);
            }
            
            // Rediriger vers l'historique des devis si l'option "Soumettre à l'admin" est sélectionnée
            if ($request->has('submit_to_admin')) {
                return redirect()->route('devis.history')->with('success', 'Votre devis a été enregistré et soumis à l\'administration pour traitement.');
            }
        }

        // Télécharger le PDF
        return $pdf->download($filename);
    }

    /**
     * Afficher l'historique des devis de l'utilisateur
     */
    public function history()
    {
        $devis = Devis::where('user_id', Auth::id())
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);
        
        return view('dashboard.devis-history', compact('devis'));
    }

    /**
     * Afficher les détails d'un devis
     */
    public function show($id)
    {
        $devis = Devis::with('transports')->findOrFail($id);
        
        // Vérifier que l'utilisateur est le propriétaire du devis ou un admin
        if (Auth::id() !== $devis->user_id && !Auth::user()->isAdmin()) {
            abort(403);
        }
        
        return view('dashboard.devis-show', compact('devis'));
    }

    /**
     * Télécharger le PDF d'un devis
     */
    public function downloadPDF($id)
    {
        $devis = Devis::findOrFail($id);
        
        // Vérifier que l'utilisateur est le propriétaire du devis ou un admin
        if (Auth::id() !== $devis->user_id && !Auth::user()->isAdmin()) {
            abort(403);
        }
        
        $filepath = storage_path('app/public/' . $devis->pdf_path);
        
        if (!file_exists($filepath)) {
            return back()->with('error', 'Le fichier PDF n\'est pas disponible.');
        }
        
        return response()->file($filepath);
    }

    /**
     * Mettre à jour le statut d'un devis (pour les admins)
     */
    public function updateStatus(Request $request, $id)
    {
        // Vérifier que l'utilisateur est un admin
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }
        
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);
        
        $devis = Devis::findOrFail($id);
        $devis->status = $validated['status'];
        $devis->save();
        
        return back()->with('success', 'Le statut du devis a été mis à jour.');
    }

    /**
     * Convertir un nombre en texte (en français)
     */
    private function numberToWords($number) 
    {
        // Pour simplifier, nous utilisons une méthode basique qui fonctionne pour les montants jusqu'à 9999,99
        $number = number_format($number, 2, '.', '');
        list($whole, $decimal) = explode('.', $number);
        
        $units = ['', 'UN', 'DEUX', 'TROIS', 'QUATRE', 'CINQ', 'SIX', 'SEPT', 'HUIT', 'NEUF'];
        $tens = ['', 'DIX', 'VINGT', 'TRENTE', 'QUARANTE', 'CINQUANTE', 'SOIXANTE', 'SOIXANTE-DIX', 'QUATRE-VINGT', 'QUATRE-VINGT-DIX'];
        $teens = ['DIX', 'ONZE', 'DOUZE', 'TREIZE', 'QUATORZE', 'QUINZE', 'SEIZE', 'DIX-SEPT', 'DIX-HUIT', 'DIX-NEUF'];
        
        $words = '';
        
        // Milliers
        if ($whole >= 1000) {
            $words .= $units[(int)($whole / 1000)] . ' MILLE ';
            $whole %= 1000;
        }
        
        // Centaines
        if ($whole >= 100) {
            $words .= $units[(int)($whole / 100)] . ' CENT ';
            $whole %= 100;
        }
        
        // Dizaines et unités
        if ($whole >= 10 && $whole < 20) {
            $words .= $teens[$whole - 10] . ' ';
        } elseif ($whole >= 20) {
            $words .= $tens[(int)($whole / 10)] . ' ';
            $units_digit = $whole % 10;
            if ($units_digit > 0) {
                $words .= $units[$units_digit] . ' ';
            }
        } elseif ($whole > 0) {
            $words .= $units[$whole] . ' ';
        }
        
        // Ajouter "DIRHAMS"
        $words .= 'DIRHAMS';
        
        // Centimes
        if ($decimal > 0) {
            $words .= ', ' . $decimal . ' Cts';
        }
        
        return $words;
    }
}