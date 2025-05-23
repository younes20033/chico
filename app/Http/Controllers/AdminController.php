<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Constructeur avec middleware admin
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Afficher le tableau de bord admin
     */
    public function dashboard()
    {
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
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Afficher la liste des devis
     */
    public function devis()
    {
        $devis = Devis::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.devis.index', compact('devis'));
    }

    /**
     * Afficher les nouveaux devis (devis en attente)
     */
    public function newDevis()
    {
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
        $devis = Devis::findOrFail($id);
        $devis->update(['status' => 'approved']);
        
        return back()->with('success', 'Le devis a été approuvé avec succès.');
    }

    /**
     * Rejeter un devis
     */
    public function rejectDevis($id)
    {
        $devis = Devis::findOrFail($id);
        $devis->update(['status' => 'rejected']);
        
        return back()->with('success', 'Le devis a été rejeté.');
    }

    /**
     * Marquer une notification comme lue
     */
    public function markNotificationAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->markAsRead();
        
        // Rediriger vers la page des nouveaux devis
        return redirect()->route('admin.devis.new');
    }

    /**
     * Afficher le formulaire d'ajout d'utilisateur
     */
    public function createUser()
    {
        return view('admin.users.create');
    }

    /**
     * Enregistrer un nouvel utilisateur
     */
    public function storeUser(Request $request)
    {
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
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Mettre à jour un utilisateur
     */
    public function updateUser(Request $request, User $user)
    {
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

        // Si un nouveau mot de passe est fourni
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
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès');
    }
}