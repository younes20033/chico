<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Vérification admin simple
     */
    private function checkAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Accès non autorisé. Vous devez être administrateur.');
        }
        return null;
    }

    /**
     * Afficher le tableau de bord admin
     */
    public function dashboard()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        // Récupérer quelques statistiques pour le tableau de bord
        $totalUsers = User::count();
        $totalClients = User::where('role', 'client')->count();
        $totalDevis = Devis::count();
        $pendingDevis = Devis::where('status', 'pending')->count();
        $approvedDevis = Devis::where('status', 'approved')->count();
        $rejectedDevis = Devis::where('status', 'rejected')->count();
        
        // Récupérer les notifications non lues
        $notifications = Notification::where('read', false)
                                   ->orderBy('created_at', 'desc')
                                   ->with('devis')
                                   ->get();
        
        // Récupérer les derniers devis soumis
        $recentDevis = Devis::with('user')
                           ->orderBy('created_at', 'desc')
                           ->take(5)
                           ->get();
        
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
     * Afficher la liste des utilisateurs
     */
    public function users()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Afficher la liste des devis
     */
    public function devis()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $devis = Devis::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.devis.index', compact('devis'));
    }

    /**
     * Afficher les nouveaux devis (devis en attente)
     */
    public function newDevis()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $devis = Devis::with('user')
                     ->where('status', 'pending')
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);
        
        return view('admin.devis.new', compact('devis'));
    }

    /**
     * Approuver un devis
     */
    public function approveDevis($id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $devis = Devis::findOrFail($id);
        $devis->update(['status' => 'approved']);
        
        return back()->with('success', 'Le devis a été approuvé avec succès.');
    }

    /**
     * Rejeter un devis
     */
    public function rejectDevis($id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $devis = Devis::findOrFail($id);
        $devis->update(['status' => 'rejected']);
        
        return back()->with('success', 'Le devis a été rejeté.');
    }

    /**
     * Marquer une notification comme lue
     */
    public function markNotificationAsRead($id)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $notification = Notification::findOrFail($id);
        $notification->markAsRead();
        
        return redirect()->route('admin.devis.new');
    }

    /**
     * Afficher le formulaire d'ajout d'utilisateur
     */
    public function createUser()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        return view('admin.users.create');
    }

    /**
     * Enregistrer un nouvel utilisateur
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
     * Afficher le formulaire d'édition d'utilisateur
     */
    public function editUser(User $user)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Mettre à jour un utilisateur
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
     * Supprimer un utilisateur
     */
    public function destroyUser(User $user)
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès');
    }

    /**
     * Afficher les notifications
     */
    public function notifications()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        $notifications = Notification::with('devis')
                                   ->orderBy('created_at', 'desc')
                                   ->paginate(20);
        
        return view('admin.notifications', compact('notifications'));
    }

    /**
     * Marquer toutes les notifications comme lues
     */
    public function markAllNotificationsAsRead()
    {
        $redirect = $this->checkAdmin();
        if ($redirect) return $redirect;

        Notification::where('read', false)->update([
            'read' => true,
            'read_at' => now()
        ]);

        return back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
    }
}