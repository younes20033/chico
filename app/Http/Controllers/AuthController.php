<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Models\Devis;
use App\Models\Notification;
use Illuminate\Http\Request;

use App\Traits\AdminAccess;

class AuthController extends Controller
{
    /**
     * Afficher le formulaire de connexion
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Afficher le formulaire de récupération de mot de passe
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Gérer la demande de connexion
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirection basée sur le rôle de l'utilisateur
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * Afficher le formulaire d'inscription
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Gérer la demande d'inscription
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:20'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'company_name' => $validated['company_name'] ?? null,
            'telephone' => $validated['telephone'] ?? null,
            'role' => 'client', // Par défaut, tous les utilisateurs sont des clients
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    /**
     * Déconnecter l'utilisateur
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Afficher le tableau de bord
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        // Redirection automatique pour les admins
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        // Pour les clients normaux
        $totalDevis = Devis::where('user_id', $user->id)->count();
        $pendingDevis = Devis::where('user_id', $user->id)->where('status', 'pending')->count();
        $approvedDevis = Devis::where('user_id', $user->id)->where('status', 'approved')->count();

        $recentDevis = Devis::where('user_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();
        dd([
        'user_id' => $user->id,
        'user_role' => $user->role,
        'is_admin' => $user->role === 'admin'
    ]);
                            
        return view('dashboard.index', compact('totalDevis', 'pendingDevis', 'approvedDevis', 'recentDevis'));
    }

    /**
     * Afficher le profil utilisateur
     */
    public function profile()
    {
        return view('dashboard.profile');
    }

    /**
     * Mettre à jour le profil utilisateur
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'company_name' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'ice' => ['nullable', 'string', 'max:50'],
            'profile_image' => ['nullable', 'image', 'max:2048'], // 2MB Max
        ]);

        // Gérer l'upload de l'image de profil
        if ($request->hasFile('profile_image')) {
            // Supprimer l'ancienne image si elle existe
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('profile_image')->store('profile-images', 'public');
            $validated['profile_image'] = $imagePath;
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès');
    }

    /**
     * Afficher le formulaire de changement de mot de passe
     */
    public function showChangePasswordForm()
    {
        return view('dashboard.change-password');
    }

    /**
     * Mettre à jour le mot de passe
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('profile')->with('success', 'Mot de passe mis à jour avec succès');
    }
}