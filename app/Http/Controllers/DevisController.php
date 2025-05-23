<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Devis;
use Illuminate\Support\Facades\Storage;
use App\Models\DevisTransport;
use App\Models\Notification;


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
     * Générer le devis PDF
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
        'action' => 'nullable|string|in:download,submit', // Validation de l'action
    ]);

    // Générer un numéro de devis unique
    $factureNo = date('Y') . '/' . str_pad(rand(100, 999), 3, '0', STR_PAD_LEFT);

    // Calculer les totaux
    $totalHT = 0;
    $transports = [];

    foreach ($validated['transports'] as $transportData) {
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

    // Calculer la TVA
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
    $filename = 'DEVIS_' . str_replace('/', '_', $factureNo) . '.pdf';
    
    // Récupérer l'action demandée
    $action = $request->input('action', 'download');
    
    // Si l'action est "submit" ET l'utilisateur est connecté
    if ($action === 'submit' && Auth::check()) {
        try {
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
            
            // Enregistrer les transports
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

            // Créer une notification pour l'administrateur
            try {
                Notification::create([
                    'type' => 'nouveau_devis',
                    'title' => 'Nouveau devis soumis',
                    'message' => "Un nouveau devis #{$factureNo} a été soumis par {$validated['contact_name']} ({$validated['company_name']})",
                    'devis_id' => $devis->id
                ]);
            } catch (\Exception $e) {
                // Si la table notifications n'existe pas, continuer sans erreur
            }
            
            // Rediriger vers l'historique avec message de succès
            return redirect()->route('devis.history')->with('success', 
                'Votre devis #' . $factureNo . ' a été soumis avec succès à l\'administration !');
                
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 
                'Erreur lors de la soumission du devis : ' . $e->getMessage()]);
        }
    }
    
    // Si l'action est "submit" mais l'utilisateur n'est pas connecté
    if ($action === 'submit' && !Auth::check()) {
        return redirect()->route('login')->with('error', 
            'Vous devez être connecté pour soumettre un devis à l\'administration.');
    }

    // Dans tous les autres cas (action "download" ou par défaut), télécharger le PDF
    return $pdf->download($filename);
}

    /**
     * Convertir un nombre en texte (en français)
     */
    private function numberToWords($number) 
{
    // Gérer le cas zéro
    if ($number == 0) {
        return 'ZÉRO DIRHAMS';
    }
    
    $number = number_format($number, 2, '.', '');
    list($whole, $decimal) = explode('.', $number);
    $whole = (int)$whole;
    
    // Tableaux pour la conversion
    $units = ['', 'UN', 'DEUX', 'TROIS', 'QUATRE', 'CINQ', 'SIX', 'SEPT', 'HUIT', 'NEUF'];
    $tens = ['', 'DIX', 'VINGT', 'TRENTE', 'QUARANTE', 'CINQUANTE', 'SOIXANTE', 'SOIXANTE-DIX', 'QUATRE-VINGT', 'QUATRE-VINGT-DIX'];
    $teens = ['DIX', 'ONZE', 'DOUZE', 'TREIZE', 'QUATORZE', 'QUINZE', 'SEIZE', 'DIX-SEPT', 'DIX-HUIT', 'DIX-NEUF'];
    
    $words = '';
    
    // Gérer les millions
    if ($whole >= 1000000) {
        $millions = (int)($whole / 1000000);
        if ($millions > 0 && $millions < 10) {
            $words .= $units[$millions] . ' MILLION' . ($millions > 1 ? 'S' : '') . ' ';
        }
        $whole %= 1000000;
    }
    
    // Gérer les milliers
    if ($whole >= 1000) {
        $milliers = (int)($whole / 1000);
        if ($milliers > 0) {
            if ($milliers == 1) {
                $words .= 'MILLE ';
            } else {
                // Convertir le nombre de milliers
                if ($milliers < 10) {
                    $words .= $units[$milliers] . ' MILLE ';
                } elseif ($milliers < 20) {
                    $words .= $teens[$milliers - 10] . ' MILLE ';
                } elseif ($milliers < 100) {
                    $dizaines = (int)($milliers / 10);
                    $unites = $milliers % 10;
                    $words .= $tens[$dizaines];
                    if ($unites > 0) {
                        $words .= '-' . $units[$unites];
                    }
                    $words .= ' MILLE ';
                } else {
                    $centaines = (int)($milliers / 100);
                    $reste = $milliers % 100;
                    $words .= $units[$centaines] . ' CENT';
                    if ($reste > 0) {
                        $words .= ' ';
                        if ($reste < 10) {
                            $words .= $units[$reste];
                        } elseif ($reste < 20) {
                            $words .= $teens[$reste - 10];
                        } else {
                            $dizaines = (int)($reste / 10);
                            $unites = $reste % 10;
                            $words .= $tens[$dizaines];
                            if ($unites > 0) {
                                $words .= '-' . $units[$unites];
                            }
                        }
                    }
                    $words .= ' MILLE ';
                }
            }
        }
        $whole %= 1000;
    }
    
    // Gérer les centaines
    if ($whole >= 100) {
        $centaines = (int)($whole / 100);
        if ($centaines > 0 && $centaines < 10) {
            if ($centaines == 1) {
                $words .= 'CENT ';
            } else {
                $words .= $units[$centaines] . ' CENT ';
            }
        }
        $whole %= 100;
    }
    
    // Gérer les dizaines et unités
    if ($whole >= 20) {
        $dizaines = (int)($whole / 10);
        $unites = $whole % 10;
        if ($dizaines > 0 && $dizaines < 10) {
            $words .= $tens[$dizaines];
            if ($unites > 0 && $unites < 10) {
                $words .= '-' . $units[$unites];
            }
            $words .= ' ';
        }
    } elseif ($whole >= 10) {
        // Nombres de 10 à 19
        $words .= $teens[$whole - 10] . ' ';
    } elseif ($whole > 0) {
        // Nombres de 1 à 9
        if ($whole < 10) {
            $words .= $units[$whole] . ' ';
        }
    }
    
    // Ajouter "DIRHAMS"
    $words .= 'DIRHAMS';
    
    // Gérer les centimes
    $decimal = (int)$decimal;
    if ($decimal > 0) {
        $words .= ' ET ';
        if ($decimal < 10) {
            $words .= $units[$decimal];
        } elseif ($decimal < 20) {
            $words .= $teens[$decimal - 10];
        } else {
            $dizaines = (int)($decimal / 10);
            $unites = $decimal % 10;
            $words .= $tens[$dizaines];
            if ($unites > 0) {
                $words .= '-' . $units[$unites];
            }
        }
        $words .= ' CENTIMES';
    }
    
    return trim($words);
}
}