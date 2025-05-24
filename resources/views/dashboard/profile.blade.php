@extends('layouts.app')

@section('title', 'Mon profil - CHICO TRANS')

@section('description', 'Gérez vos informations personnelles et paramètres de compte CHICO TRANS.')

@push('styles')
<style>
    .breadcrumb {
        background-color: transparent;
        padding: 0.5rem 0;
        margin-bottom: 1.5rem;
        font-size: 0.85rem;
    }

    .breadcrumb-item a {
        color: var(--secondary-color);
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: var(--grey-color);
    }

    .profile-header {
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #eee;
    }

    .profile-title {
        color: var(--primary-color);
        font-size: 1.8rem;
        font-weight: 600;
    }

    /* Profile Sidebar */
    .profile-sidebar-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
    }

    .profile-avatar-large {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;
        border: 3px solid var(--secondary-color);
        position: relative;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-avatar-large img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-avatar-edit {
        position: absolute;
        bottom: 5px;
        right: 0;
        background-color: var(--secondary-color);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: white;
        border: 3px solid white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: all 0.2s ease;
        z-index: 5;
    }

    .profile-avatar-edit i {
        font-size: 16px;
    }

    .profile-avatar-edit:hover {
        background-color: #c0392b;
        transform: scale(1.1);
    }

    .profile-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--primary-color);
    }

    .profile-role {
        color: var(--secondary-color);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .profile-menu-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .profile-menu .list-group-item {
        border: none;
        padding: 0.75rem 1.25rem;
        font-size: 0.9rem;
        color: var(--primary-color);
        border-left: 3px solid transparent;
    }

    .profile-menu .list-group-item.active {
        background-color: rgba(209, 51, 51, 0.05);
        color: var(--secondary-color);
        border-left: 3px solid var(--secondary-color);
    }

    .profile-menu .list-group-item:hover:not(.active) {
        background-color: #f8f9fa;
    }

    /* Main Content Cards */
    .profile-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        padding: 2rem;
        margin-bottom: 1.5rem;
    }

    .profile-card-header {
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #eee;
    }

    .profile-card-title {
        color: var(--primary-color);
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
    }

    /* Profile Container */
    .profile-container {
        padding: 2rem 0;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    /* Profile Actions */
    .btn-profile {
        background-color: var(--secondary-color);
        color: white;
        border: none;
        padding: 0.6rem 1.5rem;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.3s;
        font-size: 0.9rem;
        text-decoration: none;
        display: inline-block;
    }

    .btn-profile:hover {
        background-color: #c0392b;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .default-avatar-small {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.8rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    .default-avatar-large {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* Profile Image Upload */
    #profile_image_upload {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .profile-card {
            padding: 1.5rem;
        }
        
        .profile-avatar-large {
            width: 100px;
            height: 100px;
        }
        
        .profile-menu .list-group-item {
            padding: 0.6rem 1rem;
        }
    }
</style>
@endpush

@section('content')
<div class="profile-container">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mon profil</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="profile-header mb-4">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="profile-title mb-0">Mon profil</h1>
                    <p class="text-muted">Gérez vos informations personnelles et vos paramètres de compte</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <span class="badge rounded-pill bg-success px-3 py-2">
                        <i class="fas fa-check-circle me-1"></i> Compte actif
                    </span>
                </div>
            </div>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <!-- Main Content -->
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-3 mb-4">
                <!-- Profile Summary Card -->
                <div class="profile-sidebar">
                    <div class="profile-sidebar-card text-center mb-4">
                        <div class="profile-avatar-large">
                            @if(Auth::user()->profile_image)
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}?t={{ time() }}" 
                                     alt="{{ Auth::user()->name }}">
                            @else
                                <div class="default-avatar-large">{{ substr(Auth::user()->name, 0, 1) }}</div>
                            @endif
                            <div class="profile-avatar-edit">
                                <label for="profile_image_upload" class="mb-0" style="cursor: pointer;">
                                    <i class="fas fa-camera"></i>
                                </label>
                            </div>
                        </div>
                        <h4 class="profile-name mt-3 mb-1">{{ Auth::user()->name }}</h4>
                        <p class="profile-role mb-2">{{ Auth::user()->role === 'admin' ? 'Administrateur' : 'Client' }}</p>
                    </div>
                    
                    <!-- Navigation Menu -->
                    <div class="profile-menu-card">
                        <div class="list-group profile-menu">
                            <a href="#personal-info" class="list-group-item list-group-item-action active" data-bs-toggle="list">
                                <i class="fas fa-user-circle me-2"></i> Informations personnelles
                            </a>
                            <a href="#company-info" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                <i class="fas fa-building me-2"></i> Informations entreprise
                            </a>
                            <a href="#security" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                <i class="fas fa-shield-alt me-2"></i> Sécurité
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content Area -->
            <div class="col-lg-9">
                <div class="tab-content">
                    <!-- Personal Information Tab -->
                    <div class="tab-pane fade show active" id="personal-info">
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <h2 class="profile-card-title">
                                    <i class="fas fa-user-circle me-2"></i> Informations personnelles
                                </h2>
                                <p class="text-muted mb-0">Mettez à jour vos informations personnelles</p>
                            </div>
                            
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
                                @csrf
                                @method('PUT')
                                
                                <!-- Hidden file input for avatar upload -->
                                <input type="file" id="profile_image_upload" name="profile_image" class="d-none">
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nom complet</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="telephone" class="form-label">Téléphone</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone', Auth::user()->telephone) }}">
                                        </div>
                                        @error('telephone')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="address" class="form-label">Adresse</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', Auth::user()->address) }}">
                                        </div>
                                        @error('address')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="form-label">Ville</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', Auth::user()->city) }}">
                                        </div>
                                        @error('city')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="postal_code" class="form-label">Code postal</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-mailbox"></i></span>
                                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code', Auth::user()->postal_code) }}">
                                        </div>
                                        @error('postal_code')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mt-4 text-end">
                                    <button type="submit" class="btn-profile">
                                        <i class="fas fa-save me-2"></i> Enregistrer les modifications
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Company Information Tab -->
                    <div class="tab-pane fade" id="company-info">
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <h2 class="profile-card-title">
                                    <i class="fas fa-building me-2"></i> Informations entreprise
                                </h2>
                                <p class="text-muted mb-0">Gérez les informations de votre entreprise</p>
                            </div>
                            
                            <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="company_name" class="form-label">Nom de l'entreprise</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name', Auth::user()->company_name) }}">
                                        </div>
                                        @error('company_name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="ice" class="form-label">ICE (Identifiant Commun de l'Entreprise)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            <input type="text" class="form-control @error('ice') is-invalid @enderror" id="ice" name="ice" value="{{ old('ice', Auth::user()->ice) }}">
                                        </div>
                                        @error('ice')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mt-4 text-end">
                                    <button type="submit" class="btn-profile">
                                        <i class="fas fa-save me-2"></i> Enregistrer les modifications
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security">
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <h2 class="profile-card-title">
                                    <i class="fas fa-shield-alt me-2"></i> Sécurité du compte
                                </h2>
                                <p class="text-muted mb-0">Gérez les paramètres de sécurité de votre compte</p>
                            </div>
                            
                            <div class="security-section mt-4">
                                <h5 class="security-subtitle">
                                    <i class="fas fa-key me-2"></i> Mot de passe
                                </h5>
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <p class="text-muted mb-0">Modifiez régulièrement votre mot de passe pour renforcer la sécurité de votre compte.</p>
                                        <small class="text-muted">Dernière modification: {{ Auth::user()->updated_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <a href="{{ route('password.change') }}" class="btn-profile" style="background-color: var(--primary-color);">
                                            <i class="fas fa-lock me-1"></i> Changer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadInput = document.getElementById('profile_image_upload');
    if (!uploadInput) return;
    
    uploadInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        
        // Validation
        if (file.size > 2 * 1024 * 1024) {
            alert('Image trop grande (max 2MB)');
            e.target.value = '';
            return;
        }
        
        if (!file.type.match(/^image\/(jpeg|jpg|png|gif)$/)) {
            alert('Format non supporté. Utilisez JPG, PNG ou GIF.');
            e.target.value = '';
            return;
        }
        
        // Indicateur de chargement
        const icon = document.querySelector('.profile-avatar-edit i');
        if (icon) {
            icon.className = 'fas fa-spinner fa-spin';
        }
        
        // Préparer les données
        const formData = new FormData();
        formData.append('profile_image', file);
        formData.append('_method', 'PUT');
        
        // Token CSRF
        const token = document.querySelector('meta[name="csrf-token"]');
        if (token) {
            formData.append('_token', token.getAttribute('content'));
        }
        
        // Prévisualisation immédiate
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.querySelector('.profile-avatar-large img');
            if (img) {
                img.src = e.target.result;
            }
        };
        reader.readAsDataURL(file);
        
        // Upload
        fetch('/profile', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Restaurer l'icône
            if (icon) {
                icon.className = 'fas fa-camera';
            }
            
            if (data.success) {
                // Afficher message de succès
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success alert-dismissible fade show';
                alertDiv.style.position = 'fixed';
                alertDiv.style.top = '20px';
                alertDiv.style.right = '20px';
                alertDiv.style.zIndex = '9999';
                alertDiv.innerHTML = '✅ Photo mise à jour avec succès! <button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                document.body.appendChild(alertDiv);
                
                // Recharger après 2 secondes
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                
            } else {
                alert('Erreur: ' + (data.message || 'Erreur inconnue'));
            }
        })
        .catch(function(error) {
            // Restaurer l'icône
            if (icon) {
                icon.className = 'fas fa-camera';
            }
            alert('Erreur lors de l\'upload');
            console.error('Erreur:', error);
        });
    });
});
</script>
@endpush