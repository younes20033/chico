<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
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
        return view('auth.simple-login');
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
        return view('auth.simple-register');
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
     * Dashboard utilisateur
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

        // Pour les clients - Utiliser les données réelles
        $totalDevis = Devis::where('user_id', $user->id)->count();
        $pendingDevis = Devis::where('user_id', $user->id)->where('status', 'pending')->count();
        $approvedDevis = Devis::where('user_id', $user->id)->where('status', 'approved')->count();

        $recentDevis = Devis::where('user_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        return view('dashboard.index', compact('totalDevis', 'pendingDevis', 'approvedDevis', 'recentDevis'));
    }

    /**
     * Profil utilisateur
     */
    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('dashboard.profile');
    }

    /**
     * Mettre à jour le profil - VERSION FINALE CORRIGÉE
     */
    public function updateProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        try {
            // VALIDATION DIFFÉRENTE SELON LE TYPE DE REQUÊTE
            if ($request->hasFile('profile_image') && $request->expectsJson()) {
                // Pour l'upload d'image AJAX - validation minimale
                $request->validate([
                    'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
            } else {
                // Pour la mise à jour complète du profil
                $request->validate([
                    'name' => 'nullable|string|max:255',
                    'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
                    'company_name' => 'nullable|string|max:255',
                    'telephone' => 'nullable|string|max:20',
                    'address' => 'nullable|string|max:255',
                    'city' => 'nullable|string|max:100',
                    'postal_code' => 'nullable|string|max:20',
                    'ice' => 'nullable|string|max:50',
                    'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
            }

            $updated = false;

            // GESTION DE L'UPLOAD D'IMAGE
            if ($request->hasFile('profile_image')) {
                Log::info('Upload image démarré', [
                    'user_id' => $user->id,
                    'file_name' => $request->file('profile_image')->getClientOriginalName(),
                    'file_size' => $request->file('profile_image')->getSize()
                ]);

                // Supprimer l'ancienne image
                if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                    Storage::disk('public')->delete($user->profile_image);
                }

                // Générer un nom unique
                $extension = $request->file('profile_image')->getClientOriginalExtension();
                $fileName = 'profile_' . $user->id . '_' . time() . '_' . uniqid() . '.' . $extension;
                
                // Sauvegarder
                $imagePath = $request->file('profile_image')->storeAs('profile-images', $fileName, 'public');
                
                if (Storage::disk('public')->exists($imagePath)) {
                    // Utiliser une requête directe pour éviter les erreurs Intelephense
                    \Illuminate\Support\Facades\DB::table('users')
                        ->where('id', $user->id)
                        ->update([
                            'profile_image' => $imagePath,
                            'updated_at' => now()
                        ]);
                    
                    // Recharger les données utilisateur
                    $user = User::find($user->id);
                    
                    $updated = true;
                    
                    Log::info('Image sauvegardée', [
                        'user_id' => $user->id,
                        'path' => $imagePath
                    ]);
                } else {
                    throw new \Exception('Erreur lors de la sauvegarde du fichier');
                }
            }

            // MISE À JOUR DES AUTRES CHAMPS (seulement si ce n'est pas un upload d'image AJAX)
            if (!($request->hasFile('profile_image') && $request->expectsJson())) {
                $fieldsToUpdate = [];
                
                // Ne mettre à jour que les champs qui sont fournis et non vides
                foreach (['name', 'email', 'company_name', 'telephone', 'address', 'city', 'postal_code', 'ice'] as $field) {
                    if ($request->has($field) && $request->filled($field)) {
                        $fieldsToUpdate[$field] = $request->$field;
                    }
                }

                if (!empty($fieldsToUpdate)) {
                    // Utiliser une requête directe
                    \Illuminate\Support\Facades\DB::table('users')
                        ->where('id', $user->id)
                        ->update(array_merge($fieldsToUpdate, ['updated_at' => now()]));
                    
                    $updated = true;
                }
            }

            // RÉPONSE POUR AJAX (upload d'image)
            if ($request->expectsJson()) {
                // Recharger les données utilisateur
                $user = User::find($user->id);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Photo mise à jour avec succès!',
                    'image_url' => $user->profile_image ? asset('storage/' . $user->profile_image) : null,
                    'timestamp' => $user->updated_at->timestamp
                ]);
            }

            // RÉPONSE POUR FORMULAIRE NORMAL
            $message = $updated ? 'Profil mis à jour avec succès !' : 'Aucune modification détectée.';
            return back()->with('success', $message);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Erreur de validation', [
                'user_id' => $user->id,
                'errors' => $e->errors(),
                'request_data' => $request->except(['_token', '_method', 'profile_image'])
            ]);

            if ($request->expectsJson()) {
                // Utiliser Arr::flatten au lieu de array_flatten
                $allErrors = Arr::flatten($e->errors());
                $errorMessage = implode(', ', $allErrors);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur de validation: ' . $errorMessage,
                    'errors' => $e->errors()
                ], 422);
            }
            
            return back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            Log::error('Erreur mise à jour profil', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Erreur lors de la mise à jour: ' . $e->getMessage());
        }
    }

    /**
     * Mes devis
     */
    public function myDevis()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $devis = Devis::where('user_id', Auth::id())
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);

        return view('dashboard.devis-history', compact('devis'));
    }

    /**
     * Afficher le formulaire de changement de mot de passe
     */
    public function showChangePassword()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('dashboard.change-password');
    }

    /**
     * Changer le mot de passe
     */
    public function changePassword(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        // Utiliser une requête directe
        \Illuminate\Support\Facades\DB::table('users')
            ->where('id', $user->id)
            ->update([
                'password' => Hash::make($request->password),
                'updated_at' => now()
            ]);

        return redirect()->route('profile')->with('success', 'Mot de passe mis à jour avec succès !');
    }

    /**
     * Afficher les détails d'un devis pour le client
     */
    public function showMyDevis($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $devis = Devis::with('transports')->findOrFail($id);
        
        // Vérifier que l'utilisateur est le propriétaire du devis ou un admin
        if (Auth::id() !== $devis->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'Accès non autorisé');
        }
        
        return view('dashboard.devis-show', compact('devis'));
    }

    /**
     * Afficher le formulaire de mot de passe oublié
     */
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
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
}