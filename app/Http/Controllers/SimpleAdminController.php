<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Devis;
use App\Models\Notification;
use App\Models\Partner; // AJOUTÉ

class SimpleAdminController extends Controller
{
    /**
     * Vérification admin simple
     */
    private function checkAdmin()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Accès non autorisé. Seuls les administrateurs peuvent accéder à cette page.');
        }

        return null;
    }

    /**
     * Dashboard admin - UTILISE VOTRE VUE EXISTANTE
     */
    public function dashboard()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        // Statistiques
        $totalUsers = User::count();
        $totalClients = User::where('role', 'client')->count();
        $totalDevis = Devis::count();
        $pendingDevis = Devis::where('status', 'pending')->count();
        $approvedDevis = Devis::where('status', 'approved')->count();
        $rejectedDevis = Devis::where('status', 'rejected')->count();

        // Notifications récentes
        $notifications = collect();
        try {
            $notifications = Notification::where('read', false)
                                       ->orderBy('created_at', 'desc')
                                       ->with('devis')
                                       ->get();
        } catch (\Exception $e) {
            // Table notifications n'existe pas encore
        }

        // Derniers devis
        $recentDevis = Devis::with('user')
                           ->orderBy('created_at', 'desc')
                           ->take(5)
                           ->get();

        // UTILISEZ VOTRE VUE ADMIN DASHBOARD EXISTANTE
        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalClients', 
            'totalDevis', 
            'pendingDevis',
            'approvedDevis',
            'rejectedDevis',
            'notifications',
            'recentDevis'
        ));
    }

    /**
     * Liste des utilisateurs - UTILISE VOTRE VUE EXISTANTE
     */
    public function users()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $users = User::orderBy('created_at', 'desc')->paginate(10);
        
        // UTILISEZ VOTRE VUE ADMIN USERS EXISTANTE
        return view('admin.users.index', compact('users'));
    }

    /**
     * Liste des devis - UTILISE VOTRE VUE EXISTANTE
     */
    public function devis()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $devis = Devis::with('user')->orderBy('created_at', 'desc')->paginate(10);
        
        // UTILISEZ VOTRE VUE ADMIN DEVIS EXISTANTE
        return view('admin.devis.index', compact('devis'));
    }

    /**
     * Nouveaux devis - UTILISE VOTRE VUE EXISTANTE
     */
    public function newDevis()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $devis = Devis::with('user')
                     ->where('status', 'pending')
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);

        // Debug pour vérifier les données
        if ($devis->count() === 0) {
            return view('admin.devis.new', compact('devis'))->with('info', 'Aucun nouveau devis en attente.');
        }

        // UTILISEZ VOTRE VUE ADMIN NEW DEVIS EXISTANTE
        return view('admin.devis.new', compact('devis'));
    }

    /**
     * Approuver un devis - GARDE VOTRE LOGIQUE EXISTANTE
     */
    public function approveDevis($id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        try {
            $devis = Devis::findOrFail($id);
            $devis->update(['status' => 'approved']);
            
            return back()->with('success', 'Le devis a été approuvé avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'approbation du devis.');
        }
    }

    /**
     * Rejeter un devis - GARDE VOTRE LOGIQUE EXISTANTE
     */
    public function rejectDevis($id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        try {
            $devis = Devis::findOrFail($id);
            $devis->update(['status' => 'rejected']);
            
            return back()->with('success', 'Le devis a été rejeté.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors du rejet du devis.');
        }
    }

    /**
     * GESTION DES PARTENAIRES - MÉTHODES AJOUTÉES
     */
    
    /**
     * Liste des candidatures partenaires
     */
    public function partners()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        try {
            $partners = Partner::orderBy('created_at', 'desc')->paginate(10);
        } catch (\Exception $e) {
            // Si la table partners n'existe pas, retourner une collection vide
            $partners = collect()->paginate(10);
        }
        
        // UTILISEZ VOTRE VUE ADMIN PARTNERS EXISTANTE
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Afficher les détails d'une candidature partenaire
     */
    public function showPartner($id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        try {
            $partner = Partner::findOrFail($id);
            return view('admin.partners.show', compact('partner'));
        } catch (\Exception $e) {
            return redirect()->route('admin.partners')->with('error', 'Candidature partenaire non trouvée.');
        }
    }

    /**
     * Mettre à jour le statut d'une candidature partenaire
     */
    public function updatePartnerStatus(Request $request, $id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        try {
            $partner = Partner::findOrFail($id);
            $partner->update([
                'status' => $request->status,
                'admin_notes' => $request->admin_notes
            ]);
            
            $statusText = $request->status === 'approved' ? 'approuvée' : 'rejetée';
            return back()->with('success', "La candidature a été {$statusText} avec succès.");
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour du statut.');
        }
    }

    /**
     * Créer un utilisateur - UTILISE VOS VUES EXISTANTES
     */
    public function createUser()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;
        
        return view('admin.users.create');
    }

    /**
     * Enregistrer un utilisateur - GARDE VOTRE LOGIQUE EXISTANTE
     */
    public function storeUser(Request $request)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'role' => ['required', 'in:admin,client'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:20'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'company_name' => $validated['company_name'] ?? null,
            'telephone' => $validated['telephone'] ?? null,
        ]);

        return redirect()->route('admin.users')->with('success', 'Utilisateur créé avec succès');
    }

    /**
     * Éditer un utilisateur - UTILISE VOS VUES EXISTANTES
     */
    public function editUser(User $user)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Mettre à jour un utilisateur - GARDE VOTRE LOGIQUE EXISTANTE
     */
    public function updateUser(Request $request, User $user)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'in:admin,client'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'ice' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'Utilisateur mis à jour avec succès');
    }

    /**
     * Supprimer un utilisateur - GARDE VOTRE LOGIQUE EXISTANTE
     */
    public function destroyUser(User $user)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès');
    }

    /**
     * Notifications - UTILISE VOS VUES EXISTANTES
     */
    public function notifications()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        try {
            $notifications = Notification::with('devis')
                                       ->orderBy('created_at', 'desc')
                                       ->paginate(20);
        } catch (\Exception $e) {
            $notifications = collect()->paginate(20);
        }
        
        return view('admin.notifications', compact('notifications'));
    }

    /**
     * Marquer notification comme lue - GARDE VOTRE LOGIQUE EXISTANTE
     */
    public function markNotificationAsRead($id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        try {
            $notification = Notification::findOrFail($id);
            $notification->markAsRead();
            
            return redirect()->route('admin.devis.new');
        } catch (\Exception $e) {
            return back()->with('error', 'Notification non trouvée.');
        }
    }

    /**
     * Marquer toutes les notifications comme lues - GARDE VOTRE LOGIQUE EXISTANTE
     */
    public function markAllNotificationsAsRead()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        try {
            Notification::where('read', false)->update([
                'read' => true,
                'read_at' => now()
            ]);

            return back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour des notifications.');
        }
    }

    public function showDevis($id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $devis = Devis::with('transports', 'user')->findOrFail($id);
        
        return view('dashboard.devis-show', compact('devis'));
    }

    /**
     * Mettre à jour le statut d'un devis - MÉTHODE AJOUTÉE
     */
    public function updateDevisStatus(Request $request, $id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        try {
            $devis = Devis::findOrFail($id);
            $devis->update(['status' => $request->status]);
            
            $statusText = [
                'approved' => 'approuvé',
                'rejected' => 'rejeté',
                'pending' => 'remis en attente'
            ];
            
            return back()->with('success', "Le devis a été {$statusText[$request->status]} avec succès.");
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour du statut.');
        }
    }
    

}