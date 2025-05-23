<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHICO TRANS - Devenir Partenaire</title>
    
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
            font-size: 0.8rem;
            text-decoration: none;
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
            height: 60vh;
            min-height: 350px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/photo.png');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0; /* Hauteur de la navbar */
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
        .section-title1::after {
            content: '';
            position: absolute;
            bottom: -0.75rem;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
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
        
        /* Why Partner Section */
        .why-partner {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .why-partner-content h3 {
            color: var(--secondary-color);
            margin-bottom: 1.25rem;
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1.4;
        }
        
        .why-partner-content p {
            color: var(--grey-color);
            margin-bottom: 1rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }
        
        .why-partner-image img {
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: auto;
        }
        
        /* Benefits Cards */
        .benefit-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            height: 100%;
            transition: all 0.3s;
            text-align: center;
        }
        
        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .benefit-icon {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        
        .benefit-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.75rem;
        }
        
        .benefit-text {
            color: var(--grey-color);
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        /* Process Steps */
        .process-container {
            margin-top: 3rem;
        }
        
        .process-step {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }
        
        .step-number {
            width: 70px;
            height: 70px;
            background-color: var(--secondary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0 auto 1.2rem;
        }
        
        .step-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.8rem;
        }
         .step-title1 {
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
            margin-bottom: 0.8rem;
        }
        
        .step-description {
            color: var(--grey-color);
            font-size: 0.9rem;
            line-height: 1.6;
            max-width: 250px;
            margin: 0 auto;
        }
        
        /* Testimonials */
        .testimonial-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-bottom: 1.5rem;
            height: 100%;
            position: relative;
        }
        
        .testimonial-text {
            color: var(--grey-color);
            font-style: italic;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .testimonial-text::before {
            content: '\201C';
            font-size: 4rem;
            font-family: Georgia, serif;
            position: absolute;
            top: -1.5rem;
            left: -0.5rem;
            color: rgba(209, 51, 51, 0.1);
            z-index: 0;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1rem;
        }
        
        .author-info h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.2rem;
        }
        
        .author-info p {
            font-size: 0.85rem;
            color: var(--secondary-color);
        }
        
        /* Partner Form */
        .partner-form-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('/photo.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 5rem 0;
        }
        
        .partner-form-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .partner-form {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-top: 2rem;
        }
        
        .form-label {
            font-size: 0.9rem;
            color: var(--grey-color);
            font-weight: 500;
            text-align: left;
            display: block;
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
        
        .form-check {
            margin-top: 1rem;
            text-align: left;
        }
        
        .form-check-input {
            margin-right: 0.5rem;
        }
        
        .form-check-label {
            font-size: 0.85rem;
            color: var(--grey-color);
        }
        
        .btn-submit {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.7rem 2rem;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            margin-top: 1.5rem;
            font-size: 1rem;
        }
        
        .btn-submit:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* FAQ Accordion */
        .accordion-item {
            margin-bottom: 1rem;
            border: none;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .accordion-button {
            font-weight: 600;
            color: var(--primary-color);
            background-color: white;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 1.2rem;
        }
        
        .accordion-button:not(.collapsed) {
            color: var(--secondary-color);
            background-color: white;
        }
        
        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(209, 51, 51, 0.25);
        }
        
        .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23d13333'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }
        
        .accordion-body {
            padding: 1.2rem;
            background-color: #f9f9f9;
            color: var(--grey-color);
            font-size: 0.95rem;
            line-height: 1.6;
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
        
        /* Social media icons */
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
                height: 50vh;
                min-height: 300px;
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
                    <li class="nav-item active">
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
                            <li><a class="dropdown-item" href="/services#national">Transport national</a></li>
                            <li><a class="dropdown-item" href="/services#international">Transport international</a></li>
                            <li><a class="dropdown-item" href="/services#logistique">Logistique complète</a></li>
                            <li><a class="dropdown-item" href="/services#stockage">Stockage temporaire</a></li>
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
             <li><a class="dropdown-item" href="{{ route('admin.notifications') }}" >
    Voir toutes les notifications
</a></li>
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
    </nav>

    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="page-title" data-aos="fade-up">Devenir Partenaire</h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="100">Rejoignez notre réseau de partenaires professionnels et développons ensemble un partenariat mutuellement bénéfique pour une croissance partagée.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Why Partner Section -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Pourquoi devenir partenaire ?</h2>
            
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="why-partner-content">
                        <h3>Un partenariat stratégique pour votre entreprise</h3>
                        <p>Chez CHICO TRANS, nous croyons fermement au pouvoir de la collaboration. Notre programme de partenariat a été conçu pour créer des relations d'affaires durables et mutuellement bénéfiques avec des entreprises qui partagent nos valeurs d'excellence, de fiabilité et d'innovation.</p>
                        <p>Que vous soyez un transporteur indépendant, une société de logistique, un agent commercial ou une entreprise cherchant à optimiser sa chaîne d'approvisionnement, notre programme de partenariat vous offre des opportunités uniques de croissance et de développement.</p>
                        <p>Nous mettons à votre disposition notre expertise, notre réseau étendu et nos ressources pour vous aider à atteindre vos objectifs commerciaux tout en créant une synergie qui profite à tous les acteurs impliqués.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="why-partner-image">
                        <img src="/photo11.png" alt="Partenariat CHICO TRANS" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="section-padding section-dark">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Les avantages de notre partenariat</h2>
            
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="benefit-title">Relation de confiance</h3>
                        <p class="benefit-text">Nous établissons des relations durables basées sur la confiance mutuelle et la transparence. Vous serez considéré comme un véritable partenaire, pas simplement comme un fournisseur ou un client.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3 class="benefit-title">Avantages financiers</h3>
                        <p class="benefit-text">Bénéficiez de conditions tarifaires préférentielles, de commissions attractives sur les affaires apportées et de modalités de paiement adaptées à vos besoins pour une relation commerciale optimale.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3 class="benefit-title">Réseau international</h3>
                        <p class="benefit-text">Accédez à notre réseau international de clients et de partenaires. Élargissez votre portée commerciale et développez votre activité sur de nouveaux marchés avec notre soutien.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3 class="benefit-title">Support technique</h3>
                        <p class="benefit-text">Profitez de notre expertise technique et logistique. Nos équipes vous accompagnent dans l'optimisation de vos processus et la résolution des défis opérationnels.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h3 class="benefit-title">Visibilité marketing</h3>
                        <p class="benefit-text">Gagnez en visibilité grâce à nos actions marketing conjointes. Votre entreprise sera mise en avant dans nos supports de communication et lors de nos événements professionnels.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="benefit-title">Formation continue</h3>
                        <p class="benefit-text">Accédez à des programmes de formation spécifiques au secteur du transport et de la logistique. Développez les compétences de vos équipes pour rester à la pointe de l'innovation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Process -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Le processus de partenariat</h2>
            
            <div class="row process-container">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h3 class="step-title">Candidature</h3>
                        <p class="step-description">Remplissez le formulaire de candidature ci-dessous pour exprimer votre intérêt à devenir partenaire de CHICO TRANS.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h3 class="step-title">Évaluation</h3>
                        <p class="step-description">Notre équipe évalue votre candidature et vous contacte pour discuter des détails et des opportunités potentielles.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h3 class="step-title">Accord</h3>
                        <p class="step-description">Nous élaborons ensemble un accord de partenariat adapté à vos besoins et objectifs spécifiques.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h3 class="step-title">Collaboration</h3>
                        <p class="step-description">Le partenariat est lancé ! Nous commençons à collaborer activement pour atteindre nos objectifs communs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Partner Form Section -->
    <section class="section-padding partner-form-section">
        <div class="container">
            <div class="partner-form-container">
                <h2 class="section-title1" data-aos="fade-up">Rejoignez-nous dès aujourd'hui</h2>
                <p data-aos="fade-up" data-aos-delay="100">Remplissez le formulaire ci-dessous pour exprimer votre intérêt à devenir partenaire de CHICO TRANS. Notre équipe vous contactera dans les plus brefs délais pour discuter des opportunités de collaboration.</p>
                
                <div class="partner-form" data-aos="fade-up" data-aos-delay="200">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('partner.submit') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="company_name" class="form-label">Nom de l'entreprise *</label>
                <input type="text" id="company_name" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" required>
                @error('company_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="activity" class="form-label">Secteur d'activité *</label>
                <input type="text" id="activity" name="activity" class="form-control @error('activity') is-invalid @enderror" value="{{ old('activity') }}" required>
                @error('activity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="contact_name" class="form-label">Nom du contact *</label>
                <input type="text" id="contact_name" name="contact_name" class="form-control @error('contact_name') is-invalid @enderror" value="{{ old('contact_name') }}" required>
                @error('contact_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="position" class="form-label">Fonction *</label>
                <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" required>
                @error('position')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="email" class="form-label">Email professionnel *</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Téléphone *</label>
                <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="location" class="form-label">Ville/Pays *</label>
                <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" required>
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="website" class="form-label">Site web</label>
                <input type="url" id="website" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}">
                @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <label for="partnership_type" class="form-label">Type de partenariat souhaité *</label>
                <select id="partnership_type" name="partnership_type" class="form-control @error('partnership_type') is-invalid @enderror" required>
                    <option value="" disabled {{ old('partnership_type') ? '' : 'selected' }}>Sélectionnez une option</option>
                    <option value="transporteur" {{ old('partnership_type') == 'transporteur' ? 'selected' : '' }}>Transporteur</option>
                    <option value="agent_commercial" {{ old('partnership_type') == 'agent_commercial' ? 'selected' : '' }}>Agent commercial</option>
                    <option value="logistique" {{ old('partnership_type') == 'logistique' ? 'selected' : '' }}>Prestataire logistique</option>
                    <option value="distributeur" {{ old('partnership_type') == 'distributeur' ? 'selected' : '' }}>Distributeur</option>
                    <option value="autre" {{ old('partnership_type') == 'autre' ? 'selected' : '' }}>Autre</option>
                </select>
                @error('partnership_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <label for="message" class="form-label">Comment envisagez-vous la collaboration avec CHICO TRANS ? *</label>
                <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" rows="4" required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="form-check">
            <input type="checkbox" id="terms" name="terms" class="form-check-input @error('terms') is-invalid @enderror" {{ old('terms') ? 'checked' : '' }} required>
            <label for="terms" class="form-check-label">J'accepte que CHICO TRANS traite mes données personnelles conformément à sa politique de confidentialité pour répondre à ma demande de partenariat.</label>
            @error('terms')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane me-2"></i>
                Soumettre ma candidature
            </button>
        </div>
    </form>
</div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Questions fréquentes</h2>
            
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Quels sont les critères pour devenir partenaire de CHICO TRANS ?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Pour devenir partenaire de CHICO TRANS, nous recherchons des entreprises partageant nos valeurs d'excellence et de fiabilité. Les critères incluent notamment une expérience établie dans votre domaine, une réputation solide, une stabilité financière et un engagement envers la qualité de service. Chaque candidature est évaluée individuellement pour déterminer le potentiel de synergie.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Quels types de partenariats proposez-vous ?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Nous proposons plusieurs types de partenariats adaptés à différents profils d'entreprises : partenariats avec des transporteurs indépendants, collaborations avec des agents commerciaux, alliances avec des prestataires logistiques complémentaires, partenariats avec des distributeurs, et accords avec des entreprises technologiques. Chaque partenariat est personnalisé selon vos besoins spécifiques et nos objectifs communs.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Quelle est la durée d'un contrat de partenariat ?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            La durée standard d'un contrat de partenariat est d'un an, renouvelable. Nous commençons généralement par cette période pour évaluer la collaboration et ses résultats. Cependant, nous sommes flexibles et pouvons ajuster cette durée en fonction des spécificités du partenariat et des objectifs fixés ensemble.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Quel soutien puis-je attendre de CHICO TRANS en tant que partenaire ?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            En tant que partenaire, vous bénéficierez d'un accompagnement complet incluant : un support commercial pour le développement de votre activité, un soutien technique et logistique, des formations spécifiques, un accès à notre réseau international, une visibilité marketing sur nos différents canaux de communication, et un interlocuteur dédié pour répondre à vos besoins quotidiens.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Comment se déroule le processus de candidature ?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Le processus débute par le remplissage du formulaire de candidature sur cette page. Notre équipe examine ensuite votre demande et vous contacte pour une première discussion. Si le potentiel de collaboration est confirmé, nous organisons une rencontre pour approfondir les détails. Enfin, nous élaborons ensemble un accord de partenariat personnalisé. Le processus complet prend généralement entre 2 et 4 semaines.
                        </div>
                    </div>
                </div>
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

        // Navigation smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                if(this.getAttribute('href') !== '#' && 
                   !this.getAttribute('href').includes('Modal') && 
                   document.querySelector(this.getAttribute('href'))) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    const navbarHeight = document.querySelector('.navbar').offsetHeight;
                    
                    window.scrollTo({
                        top: targetElement.offsetTop - navbarHeight - 20,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Back to top button
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
        document.addEventListener('DOMContentLoaded', function() {
            const navbarHeight = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbarHeight + 'px';
            
            // Active nav item based on scroll position
            const sections = document.querySelectorAll('section[id]');
            
            function navHighlighter() {
                const scrollY = window.pageYOffset;
                
                sections.forEach(current => {
                    const sectionHeight = current.offsetHeight;
                    const sectionTop = current.offsetTop - 100;
                    const sectionId = current.getAttribute('id');
                    
                    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                        document.querySelector('.navbar .nav-item a[href*=' + sectionId + ']').parentElement.classList.add('active');
                    } else {
                        if (document.querySelector('.navbar .nav-item a[href*=' + sectionId + ']')) {
                            document.querySelector('.navbar .nav-item a[href*=' + sectionId + ']').parentElement.classList.remove('active');
                        }
                    }
                });
            }
            
            window.addEventListener('scroll', navHighlighter);
            navHighlighter();
        });
    </script>
</body>
</html>