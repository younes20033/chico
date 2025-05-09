<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHICO TRANS - Contactez-nous</title>
    
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/photo.png');
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
        
        /* Contact Info Styles */
        .contact-info-item {
            display: flex;
            margin-bottom: 1.5rem;
            align-items: flex-start;
        }
        
        .contact-icon {
            color: var(--secondary-color);
            font-size: 1.5rem;
            margin-right: 1rem;
            min-width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(209, 51, 51, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .contact-details h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .contact-details p {
            color: var(--grey-color);
            margin-bottom: 0;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        /* Contact Form */
        .contact-form {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
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
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .btn-submit {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.7rem 2rem;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 1rem;
        }
        
        .btn-submit:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Map Section */
        .map-container {
            height: 450px;
            width: 100%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        
        /* Contact Hours */
        .hours-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            height: 100%;
        }
        
        .hours-card h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            text-align: center;
            position: relative;
            padding-bottom: 0.75rem;
        }
        
        .hours-card h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 2px;
            background-color: var(--secondary-color);
        }
        
        .hours-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .hours-list li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .hours-list li:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .day {
            font-weight: 500;
            color: var(--primary-color);
        }
        
        .time {
            color: var(--grey-color);
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
        
        /* CTA Section */
        .cta-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('/photo.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 5rem 0;
            color: white;
            text-align: center;
        }
        
        .cta-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
        }
        
        .cta-text {
            font-size: 1.05rem;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .btn-cta {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .btn-cta-outline {
            background-color: transparent;
            border: 1px solid white;
        }
        
        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: white;
        }
        
        .btn-cta-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
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
            
            .map-container {
                height: 350px;
                margin-top: 2rem;
            }
            
            .btn-cta {
                width: 80%;
                margin-bottom: 0.5rem;
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
                    <li class="nav-item active">
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
                    <span class="user-role">{{ Auth::user()->role === 'admin' ? 'Administrateur' : 'Client' }}</span>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
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
                    <h1 class="page-title" data-aos="fade-up">Contactez-nous</h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="100">Vous avez des questions ou besoin d'un devis ? Notre équipe est à votre disposition pour vous accompagner dans tous vos projets de transport.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Contact Details Section -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos Coordonnées</h2>
            
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Notre adresse</h4>
                            <p>56, RUE IBN AL OUANANE 5020<br>AIN SEBAA CASABLANCA</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Téléphone</h4>
                            <p>+212 663 094 035</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>transport.chicotrans@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="section-padding section-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <h2 class="section-title">Envoyez-nous un message</h2>
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom complet *</label>
                                    <input type="text" id="name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" id="email" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Téléphone</label>
                                    <input type="tel" id="phone" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Sujet *</label>
                                    <input type="text" id="subject" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea id="message" class="form-control" rows="5" required></textarea>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn-submit">Envoyer le message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="section-title">Où nous trouver</h2>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.3825502755503!2d-7.5601347649922115!3d33.595377387654615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cce596bf4917%3A0xdd9decbafb1e0a3b!2s56%20Bd%20Ibn%20Al%20Ouanane%2C%20Casablanca%2020250!5e0!3m2!1sfr!2sma!4v1746217044657!5m2!1sfr!2sma" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="cta-title" data-aos="fade-up">Prêt à simplifier votre logistique ?</h2>
                    <p class="cta-text" data-aos="fade-up" data-aos-delay="100">Contactez-nous dès aujourd'hui pour discuter de vos besoins en transport et obtenir une solution personnalisée et compétitive.</p>
                    <div class="cta-buttons" data-aos="fade-up" data-aos-delay="200">
                        <a href="/devis" class="btn-cta">Demander un devis</a>
                        <a href="/contactez-nous" class="btn-cta btn-cta-outline">Nous appeler</a>
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