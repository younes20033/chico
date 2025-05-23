<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Devis;

class SimpleAuthController extends Controller
{
    /**
     * Afficher le formulaire de connexion
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.simple-login'); // Gardez votre vue simple pour login
    }

    /**
     * Traiter la connexion
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return $this->redirectBasedOnRole();
        }

        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])->withInput($request->only('email'));
    }

    /**
     * Afficher le formulaire d'inscription
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.simple-register'); // Gardez votre vue simple pour register
    }

    /**
     * Traiter l'inscription
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client',
            'company_name' => $request->company_name,
            'telephone' => $request->telephone,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Compte créé avec succès !');
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Vous êtes déconnecté.');
    }

    /**
     * Dashboard utilisateur - UTILISE VOS VUES EXISTANTES
     */
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Si admin, rediriger vers admin dashboard
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Pour les clients - UTILISE VOTRE VUE EXISTANTE
        $totalDevis = Devis::where('user_id', $user->id)->count();
        $pendingDevis = Devis::where('user_id', $user->id)->where('status', 'pending')->count();
        $approvedDevis = Devis::where('user_id', $user->id)->where('status', 'approved')->count();

        $recentDevis = Devis::where('user_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        // UTILISEZ VOTRE VUE DASHBOARD EXISTANTE
        return view('dashboard.index', compact('totalDevis', 'pendingDevis', 'approvedDevis', 'recentDevis'));
    }

    /**
     * Profil utilisateur - UTILISE VOS VUES EXISTANTES
     */
    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // UTILISEZ VOTRE VUE PROFILE EXISTANTE
        return view('dashboard.profile');
    }

    /**
     * Mettre à jour le profil - GARDE VOTRE LOGIQUE EXISTANTE
     */
    public function updateProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'company_name' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'ice' => 'nullable|string|max:50',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        // GARDE VOTRE LOGIQUE D'UPLOAD D'IMAGE EXISTANTE
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            $imagePath = $request->file('profile_image')->store('profile-images', 'public');
            $user->profile_image = $imagePath;
        }

        $user->update($request->only([
            'name', 'email', 'company_name', 'telephone', 
            'address', 'city', 'postal_code', 'ice'
        ]));

        return back()->with('success', 'Profil mis à jour avec succès !');
    }

    /**
     * Mes devis - UTILISE VOS VUES EXISTANTES
     */
    public function myDevis()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $devis = Devis::where('user_id', Auth::id())
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);

        // UTILISEZ VOTRE VUE DEVIS-HISTORY EXISTANTE
        return view('dashboard.devis-history', compact('devis'));
    }

    /**
     * Changement de mot de passe
     */
    public function showChangePassword()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // UTILISEZ VOTRE VUE CHANGE-PASSWORD EXISTANTE
        return view('dashboard.change-password');
    }

    /**
     * Redirection basée sur le rôle
     */
    private function redirectBasedOnRole()
    {
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->route('dashboard');
    }

    // AJOUTEZ ICI TOUTES VOS AUTRES MÉTHODES EXISTANTES DE AuthController
    // Comme showForgotPassword, changePassword, etc.
}