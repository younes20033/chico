<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHICO TRANS - Demande de devis</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS - Animation On Scroll -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    
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
            overflow-x: hidden;
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
        
        /* Optimized Navbar Buttons */
        .navbar-action-btns {
            display: flex;
            align-items: center;
        }
        
        .btn-auth {
            border: 1px solid var(--primary-color);
            background-color: transparent;
            color: var(--primary-color);
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-weight: 500;
            margin-right: 0.5rem;
            transition: all 0.2s;
        }
        
        .btn-auth:hover {
            background-color: var(--primary-color);
            color: white;
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
        
        /* Page Header */
        .page-header {
            position: relative;
            height: 50vh;
            min-height: 300px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/img21.jpeg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0px; /* Hauteur de la navbar */
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
        }
        
        .page-description {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        /* Section styles */
        .section-padding {
            padding: 4rem 0;
        }
        
        .section-light {
            background-color: white;
        }
        
        .section-dark {
            background-color: var(--light-color);
        }
        
        .section-title {
            position: relative;
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 2.5rem;
            text-align: center;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -0.75rem;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
        }
        
        /* Devis Form Styles */
        .devis-info-section {
            margin-bottom: 3rem;
            text-align: center;
        }
        
        .devis-title {
            color: var(--secondary-color);
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .devis-info-text {
            color: var(--grey-color);
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-bottom: 3rem;
        }
        
        .form-section-title {
            color: var(--primary-color);
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            border-left: 4px solid var(--secondary-color);
            padding-left: 15px;
        }
        
        .form-label {
            font-size: 0.9rem;
            color: var(--grey-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            padding: 0.75rem;
            border: 1px solid #e1e1e1;
            border-radius: 4px;
            font-size: 0.95rem;
            transition: all 0.3s;
            margin-bottom: 1.2rem;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(209, 51, 51, 0.15);
        }
        
        /* Transport items */
        .transport-item {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            border-left: 4px solid var(--secondary-color);
        }
        
        .remove-transport {
            position: absolute;
            top: 10px;
            right: 10px;
            color: var(--secondary-color);
            background: none;
            border: none;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .remove-transport:hover {
            transform: scale(1.2);
        }
        
        .add-transport-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 2rem;
            display: inline-flex;
            align-items: center;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        
        .add-transport-btn i {
            margin-right: 0.5rem;
        }
        
        .add-transport-btn:hover {
            background-color: #3d3d3d;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Totals Section */
        .totals-preview {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-left: 4px solid var(--secondary-color);
        }
        
        .totals-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .totals-table td {
            padding: 10px;
            border-bottom: 1px solid #e1e1e1;
        }
        
        .totals-table td:last-child {
            text-align: right;
            font-weight: 600;
        }
        
        .total-row {
            font-weight: bold;
            color: var(--secondary-color);
        }
        
        .total-row td {
            padding-top: 15px;
            font-size: 1.1rem;
        }
        
        /* Submit button */
        .btn-submit {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.8rem 2.5rem;
            border-radius: 4px;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s;
            text-transform: uppercase;
        }
        
        .btn-submit:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Footer - Clean and Professional */
        .footer {
            background-color: var(--dark-color);
            color: #ddd;
            padding: 4rem 0 2rem;
            font-size: 0.9rem;
        }
        
        .footer-logo {
            height: 60px;
            margin-bottom: 1.5rem;
        }
        
        .footer-text {
            color: #b0b0b0;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .footer-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--secondary-color);
        }
        
        .footer-links {
            list-style: none;
            padding-left: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: #b0b0b0;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--secondary-color);
            padding-left: 5px;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #b0b0b0;
        }
        
        /* Newsletter form */
        .newsletter-form {
            display: flex;
            margin-bottom: 1.5rem;
        }
        
        .newsletter-input {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: 4px 0 0 4px;
            font-size: 0.9rem;
        }
        
        .newsletter-btn {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 0 4px 4px 0;
            transition: all 0.3s;
        }
        
        .newsletter-btn:hover {
            background-color: #c0392b;
        }
        
        /* Social icons */
        .social-icons {
            margin-top: 1.5rem;
        }
        
        .social-icons a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            margin-right: 0.5rem;
            transition: all 0.3s;
        }
        
        .social-icons a:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
        }
        
        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background-color: var(--secondary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            z-index: 999;
            font-size: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .back-to-top:hover {
            background-color: #c0392b;
        }
        
        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .page-header {
                height: 40vh;
                min-height: 250px;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .page-description {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.6rem;
            }
            
            .form-container {
                padding: 1.5rem;
            }
        }
        /* User Menu Styles */
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
    </style>
</head>
<body>
    <!-- Navbar - Compact and Professional -->
    <nav class="navbar navbar-expand-lg fixed-top">
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
                        <a class="nav-link dropdown-toggle" href="/services" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                  <!-- Navbar Buttons Area -->
<div class="navbar-action-btns">
    @guest
        <!-- Buttons for not logged in users -->
        <button class="btn-auth" data-bs-toggle="modal" data-bs-target="#loginModal">CONNEXION</button>
        <button class="btn-auth" data-bs-toggle="modal" data-bs-target="#registerModal">INSCRIPTION</button>
    @else
        <!-- Dropdown for logged in users -->
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
            <span class="user-role">
                @if(Auth::user()->role === 'admin')
                    Administrateur
                @else
                    Client
                @endif
            </span>
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        @if(Auth::user()->role === 'admin')
            <!-- Menu pour Admin -->
            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.users') }}">Gestion utilisateurs</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.devis') }}">Gestion devis</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
        @else
            <!-- Menu pour Client -->
            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a></li>
            <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
            <li><a class="dropdown-item" href="{{ route('devis.history') }}">Historique des devis</a></li>
            <li><a class="dropdown-item" href="{{ route('real.time') }}">Suivi en temps réel</a></li>
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
    @endguest
    <a href="/devis" class="btn-devis">DEMANDER UN DEVIS</a>
</div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="page-title" data-aos="fade-up">Demande de devis</h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="100">Remplissez le formulaire ci-dessous pour obtenir un devis personnalisé pour vos besoins de transport.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Devis Form Section -->
    <section class="section-padding section-light">
        <div class="container">
            <div class="devis-info-section" data-aos="fade-up">
                <h2 class="devis-title">Obtenez votre devis en quelques clics</h2>
                <p class="devis-info-text">CHICO TRANS vous propose un service de devis rapide et personnalisé. Remplissez le formulaire ci-dessous avec les détails de votre demande de transport, et nous vous enverrons un devis précis que vous pourrez télécharger immédiatement au format PDF.</p>
            </div>
            
            <div class="form-container" data-aos="fade-up">
                <form id="devisForm" action="{{ route('devis.generate') }}" method="POST">
                    @csrf
                    
                    <!-- Informations client -->
                    <h3 class="form-section-title">Informations client</h3>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="company_name" class="form-label">Nom de l'entreprise *</label>
                            <input type="text" id="company_name" name="company_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ice" class="form-label">ICE (Identifiant Commun de l'Entreprise)</label>
                            <input type="text" id="ice" name="ice" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="contact_name" class="form-label">Nom du contact *</label>
                            <input type="text" id="contact_name" name="contact_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="telephone" class="form-label">Téléphone *</label>
                            <input type="tel" id="telephone" name="telephone" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Adresse complète *</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="city" class="form-label">Ville *</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="postal_code" class="form-label">Code postal</label>
                            <input type="text" id="postal_code" name="postal_code" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Taux de TVA -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tva_rate" class="form-label">Taux de TVA (%) *</label>
                            <input type="number" step="0.01" id="tva_rate" name="tva_rate" class="form-control" value="13" required>
                        </div>
                    </div>
                    
                    <!-- Transports demandés -->
                    <h3 class="form-section-title mt-4">Détails des transports demandés</h3>
                    
                    <div id="transports-container">
                        <div class="transport-item">
                            <button type="button" class="remove-transport" onclick="removeTransport(this)" style="display: none;"><i class="fas fa-times"></i></button>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Date souhaitée *</label>
                                    <input type="date" name="transports[0][date]" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Destination *</label>
                                    <input type="text" name="transports[0][destination]" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Type de véhicule *</label>
                                    <select name="transports[0][vehicle_type]" class="form-control" required>
                                        <option value="" disabled selected>Sélectionnez un type de véhicule</option>
                                        <option value="Semi Remorque">Semi Remorque</option>
                                        <option value="Plateau 12 M">Plateau 12 M</option>
                                        <option value="Fourgon">Fourgon</option>
                                        <option value="Benne">Benne</option>
                                        <option value="Citerne">Citerne</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Prix HT *</label>
                                    <input type="number" step="0.01" name="transports[0][price]" class="form-control price-input" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Référence (optionnel)</label>
                                    <input type="text" name="transports[0][reference]" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Description (optionnel)</label>
                                    <input type="text" name="transports[0][description]" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mb-4">
                        <button type="button" id="add-transport" class="add-transport-btn">
                            <i class="fas fa-plus"></i> Ajouter un transport
                        </button>
                    </div>
                    
                    <!-- Aperçu des totaux -->
                    <div class="totals-preview">
                        <h4 class="mb-3">Aperçu des totaux</h4>
                        <table class="totals-table">
                            <tr>
                                <td>Total HT :</td>
                                <td id="totalHT">0.00 DH</td>
                            </tr>
                            <tr>
                                <td>TVA (<span id="tvaRateDisplay">13</span>%) :</td>
                                <td id="totalTVA">0.00 DH</td>
                            </tr>
                            <tr class="total-row">
                                <td>Total TTC :</td>
                                <td id="totalTTC">0.00 DH</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <label for="special_requirements" class="form-label">Exigences particulières ou commentaires</label>
                            <textarea id="special_requirements" name="special_requirements" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-check mt-4 mb-4">
                        <input class="form-check-input" type="checkbox" id="terms_checkbox" name="terms" required>
                        <label class="form-check-label" for="terms_checkbox">
                            J'accepte que CHICO TRANS traite mes données personnelles conformément à sa politique de confidentialité pour répondre à ma demande de devis.
                        </label>
                    </div>
                    
                    <div class="text-center">
    <!-- Bouton pour télécharger le PDF -->
    <button type="submit" name="action" value="download" class="btn-submit me-3">
        <i class="fas fa-download me-1"></i> Générer mon devis PDF
    </button>
    
    <!-- Bouton pour soumettre à l'administration -->
    @auth
        <button type="submit" name="action" value="submit" class="btn-submit" style="background-color: var(--primary-color);">
            <i class="fas fa-paper-plane me-1"></i> Soumettre à l'administration
        </button>
    @else
        <a href="{{ route('login') }}" class="btn-submit" style="background-color: var(--primary-color); text-decoration: none; display: inline-block;">
            <i class="fas fa-paper-plane me-1"></i> Soumettre à l'administration
        </a>
    @endauth
</div>
                </form>
            </div>
        </div>
    </section>

   <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                   <a href="/"><img src="/favicon.ico" alt="CHICO TRANS Logo" class="footer-logo"></a> 
                    <p class="footer-text">Le Transport C'est Notre Spécialité. CHICO TRANS vous offre des solutions de transport fiables et efficaces depuis plus de 20 ans. Notre engagement: sécurité, ponctualité et satisfaction client.</p>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h3 class="footer-title">Liens rapides</h3>
                    <ul class="footer-links">
                        <li><a href="/">Accueil</a></li>
                        <li><a href="/qui-sommes-nous">Qui sommes-nous</a></li>
                        <li><a href="/services">Nos services</a></li>
                        <li><a href="/partenaire">Devenir partenaire</a></li>
                        <li><a href="/contactez-nous">Contactez-nous</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h3 class="footer-title">Nos services</h3>
                    <ul class="footer-links">
                        <li><a href="/services#transport-national">Transport national</a></li>
                        <li><a href="/services#transport-international">Transport international</a></li>
                        <li><a href="/services#logistique-complete">Logistique complète</a></li>
                        <li><a href="/services#stockage-temporaire">Stockage temporaire</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 CHICO TRANS. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </div>

     <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Connexion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Se souvenir de moi</label>
                    </div>
                    <div class="text-end mb-3">
                        <a href="{{ route('password.request') }}" class="text-decoration-none">Mot de passe oublié?</a>
                    </div>
                    <button type="submit" class="btn-submit w-100">Se connecter</button>
                </form>
            </div>
            <div class="modal-footer">
                <p class="mb-0">Vous n'avez pas de compte? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">S'inscrire</a></p>
            </div>
        </div>
    </div>
</div>

    <!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Nom de l'entreprise (optionnel)</label>
                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}">
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone (optionnel)</label>
                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}">
                        @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">J'accepte les conditions d'utilisation</label>
                        @error('terms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn-submit w-100">S'inscrire</button>
                </form>
            </div>
            <div class="modal-footer">
                <p class="mb-0">Vous avez déjà un compte? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Se connecter</a></p>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- AOS - Animation On Scroll -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <script>
        
        // AOS Initialization
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Transport counter
        let transportCount = 1;
        
        // Function to add a new transport
        function addTransport() {
            const container = document.getElementById('transports-container');
            const newItem = document.createElement('div');
            newItem.className = 'transport-item';
            
            newItem.innerHTML = `
                <button type="button" class="remove-transport" onclick="removeTransport(this)"><i class="fas fa-times"></i></button>
                
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Date souhaitée *</label>
                        <input type="date" name="transports[${transportCount}][date]" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Destination *</label>
                        <input type="text" name="transports[${transportCount}][destination]" class="form-control" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Type de véhicule *</label>
                        <select name="transports[${transportCount}][vehicle_type]" class="form-control" required>
                            <option value="" disabled selected>Sélectionnez un type de véhicule</option>
                            <option value="Semi Remorque">Semi Remorque</option>
                            <option value="Plateau 12 M">Plateau 12 M</option>
                            <option value="Fourgon">Fourgon</option>
                            <option value="Benne">Benne</option>
                            <option value="Citerne">Citerne</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Prix HT *</label>
                        <input type="number" step="0.01" name="transports[${transportCount}][price]" class="form-control price-input" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Référence (optionnel)</label>
                        <input type="text" name="transports[${transportCount}][reference]" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Description (optionnel)</label>
                        <input type="text" name="transports[${transportCount}][description]" class="form-control">
                    </div>
                </div>
            `;
            
            container.appendChild(newItem);
            
            // Add event listener to the new price input
            const newPriceInput = newItem.querySelector('.price-input');
            if (newPriceInput) {
                newPriceInput.addEventListener('input', calculateTotals);
            }
            
            transportCount++;
            
            // Show remove buttons if there's more than one transport
            const removeButtons = document.querySelectorAll('.remove-transport');
            if (removeButtons.length > 1) {
                removeButtons.forEach(button => {
                    button.style.display = 'block';
                });
            }
            
            // Calculate totals after adding new transport
            calculateTotals();
        }
        
        // Function to remove a transport
        function removeTransport(button) {
            const transportItem = button.parentNode;
            transportItem.parentNode.removeChild(transportItem);
            
            // Hide remove buttons if there's only one transport left
            const removeButtons = document.querySelectorAll('.remove-transport');
            if (removeButtons.length <= 1) {
                removeButtons.forEach(button => {
                    button.style.display = 'none';
                });
            }
            
            // Calculate totals after removing transport
            calculateTotals();
        }
        
        // Function to calculate totals
        function calculateTotals() {
            let totalHT = 0;
            
            // Get all price inputs
            document.querySelectorAll('.price-input').forEach(input => {
                const price = parseFloat(input.value) || 0;
                totalHT += price;
            });
            
            // Calculate TVA and TTC
            const tvaRate = parseFloat(document.getElementById('tva_rate').value) / 100 || 0;
            document.getElementById('tvaRateDisplay').textContent = document.getElementById('tva_rate').value;
            
            const totalTVA = totalHT * tvaRate;
            const totalTTC = totalHT + totalTVA;
            
            // Update display
            document.getElementById('totalHT').textContent = totalHT.toFixed(2) + ' DH';
            document.getElementById('totalTVA').textContent = totalTVA.toFixed(2) + ' DH';
            document.getElementById('totalTTC').textContent = totalTTC.toFixed(2) + ' DH';
        }
        
        // Document ready function
        document.addEventListener('DOMContentLoaded', function() {
            // Add transport button functionality
            document.getElementById('add-transport').addEventListener('click', function() {
                addTransport();
            });
            
            // Update TVA rate display when input changes
            document.getElementById('tva_rate').addEventListener('input', function() {
                document.getElementById('tvaRateDisplay').textContent = this.value;
                calculateTotals();
            });
            
            // Add event listeners to price inputs for calculating totals
            document.querySelectorAll('.price-input').forEach(function(input) {
                input.addEventListener('input', calculateTotals);
            });
            
            // Initialize totals calculation
            calculateTotals();
            
            // Back to top button functionality
            const backToTopButton = document.getElementById('backToTop');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.add('visible');
                } else {
                    backToTopButton.classList.remove('visible');
                }
            });
            
            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Add padding to body to account for fixed navbar
            const navbarHeight = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbarHeight + 'px';
        });
    </script>
</body>
</html>