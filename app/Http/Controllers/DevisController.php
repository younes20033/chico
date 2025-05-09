<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


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
        ]);

        // Générer un numéro de devis unique (version simplifiée)
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

        // Télécharger le PDF
        return $pdf->download($filename);
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