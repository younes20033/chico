<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer le mot de passe - CHICO TRANS</title>
    
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
        
        /* Password Change Content */
        .password-container {
            padding: 2rem 0;
        }
        
        .password-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .password-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-bottom: 1.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .password-card-title {
            color: var(--primary-color);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding-bottom: 0.75rem;
        }
        
        .password-card-title i {
            color: var(--secondary-color);
            margin-right: 0.5rem;
        }
        
        .form-label {
            font-size: 0.9rem;
            color: var(--grey-color);
            font-weight: 500;
        }
        
        .form-control {
            padding: 0.75rem;
            border: 1px solid #e1e1e1;
            border-radius: 4px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(209, 51, 51, 0.15);
        }
        
        .btn-password {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        
        .btn-password:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }
        
        .btn-cancel {
            background-color: var(--grey-color);
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
        
        .btn-cancel:hover {
            background-color: #5a6268;
            color: white;
        }
        
        /* Password Strength Meter */
        .password-strength {
            height: 5px;
            margin-top: 0.5rem;
            border-radius: 2px;
            background-color: #e9ecef;
        }
        
        .password-strength-meter {
            height: 100%;
            border-radius: 2px;
            transition: width 0.3s ease;
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
        
        .strength-text {
            font-size: 0.75rem;
            margin-top: 0.25rem;
            text-align: right;
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
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
                        <li><a class="dropdown-item" href="{{ route('devis.history') }}">Historique des devis</a></li>
                        
                        @if(Auth::user()->isAdmin())
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Administration</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.notifications') }}" >
    Voir toutes les notifications
</a></li>
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

    <!-- Password Change Content -->
    <div class="password-container">
        <div class="container">
            <h1 class="password-title text-center">Changer votre mot de passe</h1>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="password-card">
                <h2 class="password-card-title">
                    <i class="fas fa-lock"></i> Définir un nouveau mot de passe
                </h2>
                
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Mot de passe actuel</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        <div class="password-strength">
                            <div class="password-strength-meter"></div>
                        </div>
                        <div class="strength-text text-muted"></div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('profile') }}" class="btn-cancel">Annuler</a>
                        <button type="submit" class="btn-password">Mettre à jour le mot de passe</button>
                    </div>
                </form>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-muted">Pour des raisons de sécurité, assurez-vous que votre mot de passe :</p>
                <ul class="list-unstyled text-muted">
                    <li><i class="fas fa-check-circle text-success me-2"></i>Contient au moins 8 caractères</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>Inclut des lettres majuscules et minuscules</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>Inclut au moins un chiffre</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>Inclut au moins un caractère spécial</li>
                </ul>
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
    
    <script>
        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthMeter = document.querySelector('.password-strength-meter');
            const strengthText = document.querySelector('.strength-text');
            
            // Remove all classes
            strengthMeter.classList.remove('strength-weak', 'strength-medium', 'strength-strong', 'strength-very-strong');
            
            if (password.length === 0) {
                strengthMeter.style.width = '0';
                strengthText.textContent = '';
                return;
            }
            
            // Check password strength
            let strength = 0;
            
            // Length check
            if (password.length >= 8) strength += 1;
            
            // Uppercase and lowercase check
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 1;
            
            // Number check
            if (password.match(/\d/)) strength += 1;
            
            // Special character check
            if (password.match(/[^a-zA-Z\d]/)) strength += 1;
            
            // Set meter width and text based on strength
            if (strength === 1) {
                strengthMeter.classList.add('strength-weak');
                strengthText.textContent = 'Faible';
                strengthText.style.color = '#dc3545';
            } else if (strength === 2) {
                strengthMeter.classList.add('strength-medium');
                strengthText.textContent = 'Moyen';
                strengthText.style.color = '#ffc107';
            } else if (strength === 3) {
                strengthMeter.classList.add('strength-strong');
                strengthText.textContent = 'Fort';
                strengthText.style.color = '#28a745';
            } else if (strength === 4) {
                strengthMeter.classList.add('strength-very-strong');
                strengthText.textContent = 'Très fort';
                strengthText.style.color = '#20c997';
            }
        });
    </script>
</body>
</html>