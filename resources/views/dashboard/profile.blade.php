<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil - CHICO TRANS</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4d4d4d;
            --secondary-color: #d13333;
            --dark-color: #333333;
            --light-color: #f8f9fa;
            --grey-color: #6c757d;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        
        /* Navbar - Compact and Professional */
        .navbar {
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            background-color: white;
        }
        
        .navbar-brand img {
            height: 45px;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            text-transform: uppercase;
            color: var(--dark-color);
            font-size: 0.85rem;
            padding: 0.5rem 0.75rem;
        }
        
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--secondary-color);
        }
        
        .navbar-nav .nav-item {
            position: relative;
        }
        
        .navbar-nav .nav-item::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0.75rem;
            background-color: var(--secondary-color);
            transition: width 0.3s;
        }
        
        .navbar-nav .nav-item:hover::after,
        .navbar-nav .nav-item.active::after {
            width: calc(100% - 1.5rem);
        }
        
        .dropdown-menu {
            border-radius: 0.25rem;
            border: none;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            min-width: 12rem;
        }
        
        .dropdown-item {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: var(--secondary-color);
        }
        
       /* User Menu */
                .user-menu {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: var(--primary-color);
    padding: 0.4rem 0.8rem;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.user-menu:hover {
    background-color: rgba(0, 0, 0, 0.05);
    color: var(--primary-color);
}
        
       .user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 0.5rem;
    border: 2px solid var(--secondary-color);
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-info {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}

.user-name {
    font-weight: 600;
    font-size: 0.85rem;
    color: var(--primary-color);
}

.user-role {
    font-size: 0.7rem;
    color: var(--grey-color);
}
        
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

.badge {
    font-weight: 500;
    letter-spacing: 0.3px;
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
.profile-avatar-edit::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--secondary-color);
    border-radius: 50%;
    z-index: -1;
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

.profile-stats {
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid #eee;
}

.profile-stat-item {
    padding: 0.5rem 0;
}

.profile-stat-item h5 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 0.1rem;
}

.profile-stat-item span {
    font-size: 0.8rem;
    color: var(--grey-color);
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

.profile-form .input-group {
    margin-bottom: 0.5rem;
}

.profile-form .input-group-text {
    background-color: #f8f9fa;
    color: var(--grey-color);
    border-color: #e1e1e1;
}

/* Security Tab */
.security-section {
    padding: 0.75rem 0;
}

.security-subtitle {
    color: var(--primary-color);
    font-size: 1.1rem;
    margin-bottom: 1rem;
}

.security-strength {
    height: 6px;
    width: 100px;
    background-color: #e9ecef;
    border-radius: 3px;
    overflow: hidden;
}

.security-strength-meter {
    height: 100%;
    border-radius: 3px;
}

.strength-weak {
    width: 25%;
    background-color: #dc3545;
}

.strength-medium {
    width: 50%;
    background-color: #ffc107;
}

.strength-strong {
    width: 75%;
    background-color: #28a745;
}
.strength-very-strong {
   width: 100%;
   background-color: #20c997;
}

.login-history-table {
   font-size: 0.9rem;
}

.login-history-table th {
   font-weight: 500;
   color: var(--grey-color);
}

/* Danger Zone */
.danger-zone {
   padding: 0.75rem 0;
}

.danger-title {
   color: var(--primary-color);
   font-size: 1.1rem;
   margin-bottom: 0.5rem;
}

/* Notifications Tab */
.notification-item {
   padding: 0.75rem 0;
}

.notification-item p {
   color: var(--primary-color);
}

.fw-medium {
   font-weight: 500;
}

/* Form Controls Responsive */
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
   
   .security-section .row {
       flex-direction: column;
   }
   
   .security-section .col-md-4 {
       text-align: left !important;
       margin-top: 1rem !important;
   }
   
   .danger-zone .row {
       flex-direction: column;
   }
   
   .danger-zone .col-md-4 {
       text-align: left !important;
       margin-top: 0.5rem !important;
   }
}
        /* Footer */
        .footer {
            background-color: white;
            padding: 1rem 0;
            text-align: center;
            font-size: 0.85rem;
            color: var(--grey-color);
            border-top: 1px solid #eee;
            margin-top: 2rem;
        }
        .btn-devis {
            background-color: var(--secondary-color);
            color: white;
            text-decoration: none;
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-weight: 500;
            border: none;
            transition: all 0.2s;
        }
        
        .btn-devis:hover {
            background-color: #c0392b;
        }
        
        @media (max-width: 991.98px) {
            .navbar-action-btns {
                margin-top: 0.5rem;
                flex-wrap: wrap;
            }
            
            .btn-auth, .btn-devis {
                margin-bottom: 0.5rem;
                font-size: 0.75rem;
                padding: 0.35rem 0.7rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/logo.png" alt="CHICO TRANS Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/qui-sommes-nous">QUI SOMMES-NOUS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            NOS SERVICES
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/services#transport-national">Transport national</a></li>
                            <li><a class="dropdown-item" href="/services#transport-international">Transport international</a></li>
                            <li><a class="dropdown-item" href="/services#logistique-complete">Logistique complète</a></li>
                            <li><a class="dropdown-item" href="/services#stockage-temporaire">Stockage temporaire</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/partenaire">DEVENIR PARTENAIRE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactez-nous">CONTACTEZ-NOUS</a>
                    </li>
                </ul>
                
                <div class="dropdown">
                    <a class="user-menu dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar">
                            @if(Auth::user()->profile_image)
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }}">
                            @else
                                <img src="{{ asset('img/default-avatar.png') }}" alt="{{ Auth::user()->name }}">
                            @endif
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <span class="user-role">{{ Auth::user()->role === 'admin' ? 'Administrateur' : 'Client' }}</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li><a class="dropdown-item " href="{{ route('profile') }}">Mon profil</a></li>
                        <li><a class="dropdown-item" href="{{ route('devis.history') }}">Historique des devis</a></li>
                        <li><a class="dropdown-item" href="{{ route('real.time') }}">Suivi en temps réel</a></li>
                        @if(Auth::user()->isAdmin())
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Administration</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <a href="/devis" class="btn-devis">DEMANDER UN DEVIS</a>
            </div>
        </div>
    </nav>

    <!-- Profile Content -->
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
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }}">
                            @else
                                <img src="{{ asset('img/default-avatar.png') }}" alt="{{ Auth::user()->name }}">
                            @endif
                            <div class="profile-avatar-edit">
                                <label for="profile_image_upload" class="mb-0">
                                    <i class="fas fa-camera"></i>
                                </label>
                            </div>
                        </div>
                        <h4 class="profile-name mt-3 mb-1">{{ Auth::user()->name }}</h4>
                        <p class="profile-role mb-2">{{ Auth::user()->role === 'admin' ? 'Administrateur' : 'Client' }}</p>
                        <div class="profile-stats">
                            <div class="row g-0">
                                <div class="col">
                                    <div class="profile-stat-item">
                                        <h5>12</h5>
                                        <span>Devis</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="profile-stat-item">
                                        <h5>8</h5>
                                        <span>Transports</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <a href="#notifications" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                <i class="fas fa-bell me-2"></i> Notifications
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
                                <input type="file" id="profile_image" name="profile_image" class="d-none">
                                
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
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 mb-3">
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
                                
                                <div class="mb-3">
                                    <label class="form-label">Type d'activité</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        <select class="form-select">
                                            <option>Import/Export</option>
                                            <option>Commerce de détail</option>
                                            <option>Industrie</option>
                                            <option>Services</option>
                                            <option>Transport</option>
                                            <option>Autre</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Description de l'entreprise</label>
                                    <textarea class="form-control" rows="4" placeholder="Décrivez brièvement votre entreprise et ses activités..."></textarea>
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
                        <div class="profile-card mb-4">
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
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="security-strength">
                                                <div class="security-strength-meter strength-strong"></div>
                                            </div>
                                            <span class="text-success ms-2">Fort</span>
                                        </div>
                                        <small class="text-muted">Dernière modification: {{ Auth::user()->updated_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <a href="{{ route('password.change') }}" class="btn-profile btn-password">
                                            <i class="fas fa-lock me-1"></i> Changer
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="security-section">
                                <h5 class="security-subtitle">
                                    <i class="fas fa-mobile-alt me-2"></i> Authentification à deux facteurs
                                </h5>
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <p class="text-muted mb-0">Ajoutez une couche de sécurité supplémentaire en activant l'authentification à deux facteurs.</p>
                                    </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <div class="form-check form-switch d-flex justify-content-md-end align-items-center">
                                            <input class="form-check-input me-2" type="checkbox" id="two_factor">
                                            <label class="form-check-label" for="two_factor">Inactif</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="security-section">
                                <h5 class="security-subtitle">
                                    <i class="fas fa-history me-2"></i> Historique des connexions
                                </h5>
                                <p class="text-muted mb-3">Consultez les dernières connexions à votre compte</p>
                                
                                <div class="table-responsive">
                                    <table class="table table-hover login-history-table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Appareil</th>
                                                <th>Navigateur</th>
                                                <th>Localisation</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</td>
                                                <td>Desktop</td>
                                                <td>Chrome</td>
                                                <td>Casablanca, MA</td>
                                                <td><span class="badge bg-success">Succès</span></td>
                                            </tr>
                                            <tr>
                                                <td>{{ \Carbon\Carbon::now()->subDays(2)->format('d/m/Y H:i') }}</td>
                                                <td>Mobile</td>
                                                <td>Safari</td>
                                                <td>Casablanca, MA</td>
                                                <td><span class="badge bg-success">Succès</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <h2 class="profile-card-title text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i> Zone dangereuse
                                </h2>
                                <p class="text-muted mb-0">Actions qui affectent définitivement votre compte</p>
                            </div>
                            
                            <div class="danger-zone mt-4">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h5 class="danger-title">Désactiver votre compte</h5>
                                        <p class="text-muted mb-0">Suspendre temporairement votre compte sans supprimer vos données</p>
                                    </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <button class="btn btn-outline-warning">
                                            <i class="fas fa-pause me-1"></i> Désactiver
                                        </button>
                                    </div>
                                </div>
                                
                                <hr class="my-4">
                                
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h5 class="danger-title">Supprimer votre compte</h5>
                                        <p class="text-muted mb-0">Supprimer définitivement votre compte et toutes vos données</p>
                                    </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <button class="btn btn-outline-danger">
                                            <i class="fas fa-trash-alt me-1"></i> Supprimer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications">
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <h2 class="profile-card-title">
                                    <i class="fas fa-bell me-2"></i> Préférences de notifications
                                </h2>
                                <p class="text-muted mb-0">Gérez la façon dont vous recevez les notifications</p>
                            </div>
                            
                            <div class="mt-4">
                                <h5 class="mb-3">Notifications par email</h5>
                                
                                <div class="notification-item d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-0 fw-medium">Mises à jour de transport</p>
                                        <small class="text-muted">Recevoir des notifications sur le statut de vos transports</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="notify_transport" checked>
                                    </div>
                                </div>
                                
                                <div class="notification-item d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-0 fw-medium">Confirmations de devis</p>
                                        <small class="text-muted">Recevoir des notifications pour les nouveaux devis</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="notify_quotes" checked>
                                    </div>
                                </div>
                                
                                <div class="notification-item d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-0 fw-medium">Offres spéciales</p>
                                        <small class="text-muted">Recevoir des informations sur nos promotions et offres</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="notify_promo" checked>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div>
                                <h5 class="mb-3">Notifications par SMS</h5>
                                
                                <div class="notification-item d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-0 fw-medium">Alertes de livraison</p>
                                        <small class="text-muted">Recevoir des SMS pour les notifications de livraison</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="sms_delivery">
                                    </div>
                                </div>
                                
                                <div class="notification-item d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-0 fw-medium">Rappels de paiement</p>
                                        <small class="text-muted">Recevoir des SMS pour les rappels de facturation</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="sms_payment">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 text-end">
                                <button class="btn-profile">
                                    <i class="fas fa-save me-2"></i> Enregistrer les préférences
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CHICO TRANS. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>