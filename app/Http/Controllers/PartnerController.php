<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Partner;
use App\Models\Notification;

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
        // Debug simple avec dd() pour voir si on arrive ici
        // dd('La méthode submitApplication est appelée', $request->all());

        // Validation
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
        ]);

        try {
            // Créer les tables si elles n'existent pas
            $this->createTablesIfNotExist();
            
            // Sauvegarder le partenaire
            $partner = $this->savePartner($validated);
            
            // Créer la notification
            $this->createNotification($validated, $partner ? $partner->id : null);
            
            // Retourner avec message de succès et info debug
            $debugInfo = $this->getDebugInfo();
            
            return back()->with('success', 
                'Candidature soumise avec succès! ' . 
                'Debug: Partners=' . $debugInfo['partners_count'] . 
                ', Notifications=' . $debugInfo['notifications_count']
            );
            
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 
                'Erreur: ' . $e->getMessage());
        }
    }

    /**
     * Créer les tables si elles n'existent pas
     */
    private function createTablesIfNotExist()
    {
        // Créer table partners
        if (!Schema::hasTable('partners')) {
            Schema::create('partners', function ($table) {
                $table->id();
                $table->string('company_name');
                $table->string('activity');
                $table->string('contact_name');
                $table->string('position');
                $table->string('email');
                $table->string('phone');
                $table->string('location');
                $table->string('website')->nullable();
                $table->string('partnership_type');
                $table->text('message');
                $table->string('status')->default('pending');
                $table->text('admin_notes')->nullable();
                $table->timestamp('contacted_at')->nullable();
                $table->timestamps();
            });
        }

        // Créer table notifications
        if (!Schema::hasTable('notifications')) {
            Schema::create('notifications', function ($table) {
                $table->id();
                $table->string('type');
                $table->string('title');
                $table->text('message');
                $table->bigInteger('devis_id')->nullable();
                $table->bigInteger('partner_id')->nullable();
                $table->boolean('read')->default(false);
                $table->timestamp('read_at')->nullable();
                $table->timestamps();
            });
        } else {
            // Ajouter colonne partner_id si elle n'existe pas
            if (!Schema::hasColumn('notifications', 'partner_id')) {
                Schema::table('notifications', function ($table) {
                    $table->bigInteger('partner_id')->nullable()->after('devis_id');
                });
            }
        }
    }

    /**
     * Sauvegarder le partenaire
     */
    private function savePartner($validated)
    {
        try {
            if (Schema::hasTable('partners')) {
                return Partner::create($validated);
            } else {
                // Insertion directe si le modèle ne fonctionne pas
                DB::table('partners')->insert(array_merge($validated, [
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now()
                ]));
                return (object)['id' => DB::getPdo()->lastInsertId()];
            }
        } catch (\Exception $e) {
            // Si erreur, continuer quand même
            return null;
        }
    }

    /**
     * Créer la notification
     */
    private function createNotification($validated, $partnerId = null)
    {
        try {
            $notificationData = [
                'type' => 'nouvelle_candidature_partenaire',
                'title' => 'Nouvelle candidature de partenariat',
                'message' => "Candidature de {$validated['contact_name']} ({$validated['company_name']}) - {$this->getPartnershipTypeLabel($validated['partnership_type'])}",
                'partner_id' => $partnerId,
                'devis_id' => null,
                'read' => false,
                'created_at' => now(),
                'updated_at' => now()
            ];

            if (class_exists('App\Models\Notification')) {
                Notification::create($notificationData);
            } else {
                DB::table('notifications')->insert($notificationData);
            }
        } catch (\Exception $e) {
            // Continuer même si erreur notification
        }
    }

    /**
     * Obtenir les infos de debug
     */
    private function getDebugInfo()
    {
        return [
            'partners_table_exists' => Schema::hasTable('partners'),
            'notifications_table_exists' => Schema::hasTable('notifications'),
            'partners_count' => Schema::hasTable('partners') ? DB::table('partners')->count() : 0,
            'notifications_count' => Schema::hasTable('notifications') ? DB::table('notifications')->count() : 0,
        ];
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
}