<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHICO TRANS - Qui sommes-nous</title>
    
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/img6.jpg');
            background-size: cover;
            background-position: center;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0;
            text-align: center;
            color: white;
        }
        
        .page-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .page-description {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        /* Section Styles */
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
        
        /* About Story Section */
        .about-content h3 {
            color: var(--secondary-color);
            margin-bottom: 1.25rem;
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1.4;
        }
        
        .about-content p {
            color: var(--grey-color);
            margin-bottom: 1rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }
        
        .about-image img {
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        
        /* Timeline Section */
        .timeline {
            position: relative;
            max-width: 1140px;
            margin: 0 auto;
            padding: 0;
            overflow: hidden;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            width: 3px;
            background-color: var(--secondary-color);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -1.5px;
            z-index: 0;
        }
        
        .timeline-item {
            padding: 0 0 2.5rem 0;
            position: relative;
            width: 100%;
            clear: both;
        }
        
        .timeline-content {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            position: relative;
            width: calc(50% - 40px);
            z-index: 1;
        }
        
        .timeline-left {
            float: left;
        }
        
        .timeline-right {
            float: right;
        }
        
        .timeline-marker {
            position: absolute;
            width: 24px;
            height: 24px;
            background-color: white;
            border: 4px solid var(--secondary-color);
            border-radius: 50%;
            top: 20px;
            z-index: 1;
            left: 50%;
            margin-left: -12px;
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.5);
        }
        
        .timeline-date {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }
        
        .timeline-title {
            color: var(--primary-color);
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .timeline-text {
            color: var(--grey-color);
            line-height: 1.5;
            font-size: 0.9rem;
        }
        
        /* Clearfix for timeline */
        .timeline::after {
            content: "";
            display: table;
            clear: both;
        }
        
        @media (max-width: 767.98px) {
            .timeline::before {
                left: 30px;
            }
            
            .timeline-content {
                width: calc(100% - 80px);
                float: right;
                margin-left: 60px;
            }
            
            .timeline-marker {
                left: 16px;
                margin-left: 0;
            }
        }
        
        /* Mission and Values Section */
        .mission-box, .values-box {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            height: 100%;
            margin-bottom: 1.5rem;
        }
        
        .mission-title, .values-title {
            color: var(--secondary-color);
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .mission-text, .values-text {
            color: var(--grey-color);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        
        .values-list {
            list-style: none;
            padding-left: 0;
        }
        
        .value-item {
            margin-bottom: 1.25rem;
            display: flex;
            align-items: flex-start;
        }
        
        .value-icon {
            color: var(--secondary-color);
            font-size: 1.1rem;
            margin-right: 0.75rem;
            margin-top: 0.2rem;
        }
        
        .value-content {
            flex: 1;
        }
        
        .value-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
            font-size: 1rem;
        }
        
        .value-text {
            color: var(--grey-color);
            line-height: 1.5;
            font-size: 0.9rem;
        }
        
        /* Stats Section */
        .stats-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('/photo.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            padding: 5rem 0;
        }
        
        .stats-section .section-title {
            color: white;
        }
        
        .stat-box {
            padding: 1.5rem;
            text-align: center;
            position: relative;
        }
        
        .stat-circle {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.2);
            background-color: rgba(209, 51, 51, 0.8);
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        
        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
        }
        
        .stat-text {
            font-size: 0.9rem;
            color: white;
            max-width: 120px;
            margin: 0 auto;
            line-height: 1.3;
        }
        
        /* Certifications Section */
        .certification-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            text-align: center;
            height: 100%;
            transition: all 0.3s;
            margin-bottom: 1.5rem;
        }
        
        .certification-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }
        
        .certification-icon {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .certification-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .certification-text {
            color: var(--grey-color);
            line-height: 1.5;
            font-size: 0.9rem;
        }
        
        /* CTA Section */
        .cta-section {
            background-color: white;
            text-align: center;
            padding: 4rem 0;
        }
        
        .cta-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.25rem;
        }
        
        .cta-text {
            font-size: 1rem;
            color: var(--grey-color);
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto 2rem;
        }
        
        .btn-cta {
            display: inline-block;
            padding: 0.7rem 1.5rem;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s;
            text-decoration: none;
            margin: 0 0.5rem 1rem;
        }
        
        .btn-cta-primary {
            background-color: var(--secondary-color);
            color: white;
            border: none;
        }
        
        .btn-cta-secondary {
            background-color: transparent;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        
        .btn-cta:hover {
            transform: translateY(-3px);
        }
        
        .btn-cta-primary:hover {
            background-color: #c0392b;
            color: white;
        }
        
        .btn-cta-secondary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* Footer */
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
        
        /* Modal styles */
        .modal-content {
            border-radius: 8px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .modal-header {
            border-bottom: none;
            padding: 1.5rem 1.5rem 0.5rem;
        }
        
        .modal-body {
            padding: 1rem 1.5rem;
        }
        
        .modal-footer {
            border-top: none;
            padding: 0.5rem 1.5rem 1.5rem;
            justify-content: center;
        }
        
        .form-label {
            font-size: 0.9rem;
            color: var(--grey-color);
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
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
                    <li class="nav-item active">
                        <a class="nav-link active" href="/qui-sommes-nous">QUI SOMMES-NOUS</a>
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
                <div class="navbar-action-btns">
                    <button class="btn-auth" data-bs-toggle="modal" data-bs-target="#loginModal">CONNEXION</button>
                    <button class="btn-auth" data-bs-toggle="modal" data-bs-target="#registerModal">INSCRIPTION</button>
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
                    <h1 class="page-title" data-aos="fade-up">Qui sommes-nous</h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="100">Découvrez l'histoire, les valeurs et l'équipe qui font de CHICO TRANS un leader dans le secteur du transport de remorques depuis plus de 20 ans.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- About Story Section -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Notre histoire</h2>
            
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="about-content">
                        <h3>Une société basée sur l'expérience et la passion</h3>
                        <p>Fondée en 2005 à Casablanca, CHICO TRANS est née de la vision de son fondateur, Mr. Hamid Chichaoui, un expert du secteur logistique avec plus de 30 ans d'expérience dans le transport international. Face à la demande croissante de services de transport fiables et professionnels, il a décidé de créer une entreprise dédiée au transport de remorques, fusionnant son expertise technique avec un engagement profond envers la satisfaction client.</p>
                        <p>Ce qui a commencé comme une petite entreprise familiale avec seulement 5 véhicules s'est rapidement développé pour devenir un acteur majeur du transport au Maroc. Au fil des années, CHICO TRANS a su évoluer, se diversifier et s'adapter aux exigences changeantes du marché, tout en conservant ses valeurs fondamentales de fiabilité, de ponctualité et d'excellence de service.</p>
                        <p>Aujourd'hui, avec une flotte de plus de 50 véhicules modernes, une équipe professionnelle dévouée et un réseau international de partenaires, CHICO TRANS continue de croître et d'innover, tout en restant fidèle à sa mission originelle : offrir des services de transport de qualité supérieure, adaptés aux besoins spécifiques de chaque client.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-image">
                        <img src="/photo11.png" alt="CHICO TRANS histoire" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="section-padding section-dark">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Notre parcours</h2>
            
            <div class="timeline">
                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-content timeline-left">
                        <div class="timeline-date">2005</div>
                        <h3 class="timeline-title">Création de CHICO TRANS</h3>
                        <p class="timeline-text">Fondation de l'entreprise à Casablanca avec une flotte initiale de 5 véhicules, spécialisée dans le transport national de remorques.</p>
                    </div>
                    <div class="timeline-marker"></div>
                </div>
                
                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-content timeline-right">
                        <div class="timeline-date">2007</div>
                        <h3 class="timeline-title">Expansion des services</h3>
                        <p class="timeline-text">Élargissement de notre offre avec l'ajout du transport international vers l'Espagne et la France. Acquisition de 10 nouveaux véhicules.</p>
                    </div>
                    <div class="timeline-marker"></div>
                </div>
                
                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-content timeline-left">
                        <div class="timeline-date">2010</div>
                        <h3 class="timeline-title">Certification ISO 9001</h3>
                        <p class="timeline-text">Obtention de la certification ISO 9001 pour notre système de management de la qualité, témoignant de notre engagement envers l'excellence.</p>
                    </div>
                    <div class="timeline-marker"></div>
                </div>
                
                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-content timeline-right">
                        <div class="timeline-date">2013</div>
                        <h3 class="timeline-title">Nouveaux locaux</h3>
                        <p class="timeline-text">Inauguration de notre nouveau siège social à Casablanca, incluant des bureaux modernes et un entrepôt de stockage de 5000m².</p>
                    </div>
                    <div class="timeline-marker"></div>
                </div>
                
                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-content timeline-left">
                        <div class="timeline-date">2017</div>
                        <h3 class="timeline-title">Expansion africaine</h3>
                        <p class="timeline-text">Développement de notre réseau en Afrique de l'Ouest et création de partenariats stratégiques avec des entreprises locales.</p>
                    </div>
                    <div class="timeline-marker"></div>
                </div>
                
                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-content timeline-right">
                        <div class="timeline-date">2020</div>
                        <h3 class="timeline-title">Modernisation de la flotte</h3>
                        <p class="timeline-text">Renouvellement complet de notre flotte avec des véhicules écologiques de dernière génération, réduisant notre empreinte carbone.</p>
                    </div>
                    <div class="timeline-marker"></div>
                </div>
                
                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-content timeline-left">
                        <div class="timeline-date">2023</div>
                        <h3 class="timeline-title">Transformation digitale</h3>
                        <p class="timeline-text">Lancement de notre nouvelle plateforme digitale permettant à nos clients de suivre leurs expéditions en temps réel et de gérer leurs demandes en ligne.</p>
                    </div>
                    <div class="timeline-marker"></div>
                </div>
                
                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-content timeline-right">
                        <div class="timeline-date">2025</div>
                        <h3 class="timeline-title">Vision d'avenir</h3>
                        <p class="timeline-text">Poursuite de notre croissance avec l'objectif de devenir le leader du transport de remorques en Afrique du Nord, tout en maintenant notre engagement envers la qualité et l'innovation.</p>
                    </div>
                    <div class="timeline-marker"></div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Mission and Values Section -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Notre mission et nos valeurs</h2>
            
            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <div class="mission-box h-100">
                        <h3 class="mission-title">Notre mission</h3>
                        <p class="mission-text">Chez CHICO TRANS, notre mission est de fournir des solutions de transport et de logistique fiables, efficaces et adaptées qui répondent aux besoins spécifiques de nos clients, tout en contribuant positivement au développement économique du Maroc et de la région.</p>
                        <p class="mission-text">Nous nous engageons à offrir un service de qualité supérieure, à optimiser les délais de livraison, à garantir la sécurité des marchandises transportées et à maintenir des relations durables basées sur la confiance et le respect mutuel avec nos clients, partenaires et collaborateurs.</p>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4" data-aos="fade-left">
                    <div class="values-box h-100">
                        <h3 class="values-title">Nos valeurs</h3>
                        <ul class="values-list">
                            <li class="value-item">
                                <div class="value-icon"><i class="fas fa-check-circle"></i></div>
                                <div class="value-content">
                                    <h4 class="value-title">Excellence</h4>
                                    <p class="value-text">Nous visons l'excellence dans tous les aspects de nos opérations, en cherchant constamment à améliorer nos processus et à dépasser les attentes de nos clients.</p>
                                </div>
                            </li>
                            <li class="value-item">
                                <div class="value-icon"><i class="fas fa-check-circle"></i></div>
                                <div class="value-content">
                                    <h4 class="value-title">Intégrité</h4>
                                    <p class="value-text">Nous agissons avec honnêteté, transparence et éthique dans toutes nos relations d'affaires, en respectant nos engagements et en assumant la responsabilité de nos actions.</p>
                                </div>
                            </li>
                            <li class="value-item">
                                <div class="value-icon"><i class="fas fa-check-circle"></i></div>
                                <div class="value-content">
                                    <h4 class="value-title">Innovation</h4>
                                    <p class="value-text">Nous encourageons l'innovation et l'adoption de nouvelles technologies pour améliorer continuellement nos services et rester à la pointe de notre industrie.</p>
                                </div>
                            </li>
                            <li class="value-item">
                                <div class="value-icon"><i class="fas fa-check-circle"></i></div>
                                <div class="value-content">
                                    <h4 class="value-title">Respect</h4>
                                    <p class="value-text">Nous traitons nos clients, nos employés, nos partenaires et l'environnement avec respect, en valorisant la diversité et en promouvant un milieu de travail inclusif.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">CHICO TRANS en chiffres</h2>
            
            <div class="row">
                <div class="col-6 col-md-3 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-box">
                        <div class="stat-circle">
                            <div class="stat-number"><span class="counter-value" data-count="50">0</span>+</div>
                            <div class="stat-text">Véhicules en flotte</div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-md-3 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-box">
                        <div class="stat-circle">
                            <div class="stat-number"><span class="counter-value" data-count="20">0</span>+</div>
                            <div class="stat-text">Années d'expérience</div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-md-3 mb-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-box">
                        <div class="stat-circle">
                            <div class="stat-number"><span class="counter-value" data-count="2000">0</span>+</div>
                            <div class="stat-text">Clients satisfaits</div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-md-3 mb-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="stat-box">
                        <div class="stat-circle">
                            <div class="stat-number"><span class="counter-value" data-count="20">0</span>+</div>
                            <div class="stat-text">Pays desservis</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Certifications Section -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos certifications et engagements</h2>
            
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="certification-card h-100">
                        <div class="certification-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="certification-title">ISO 9001:2015</h3>
                        <p class="certification-text">Notre système de management de la qualité est certifié ISO 9001:2015, garantissant notre engagement envers l'amélioration continue et la satisfaction client.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="certification-card h-100">
                        <div class="certification-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3 class="certification-title">ISO 14001:2015</h3>
                        <p class="certification-text">Notre certification environnementale témoigne de notre engagement à réduire notre impact écologique et à promouvoir des pratiques de transport durables.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="certification-card h-100">
                        <div class="certification-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="certification-title">SQAS</h3>
                        <p class="certification-text">Cette évaluation confirme notre conformité aux normes de sécurité et de qualité les plus strictes dans le domaine du transport routier.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="certification-card h-100">
                        <div class="certification-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3 class="certification-title">Responsabilité Sociale</h3>
                        <p class="certification-text">Nous soutenons activement des initiatives sociales locales et nous nous engageons à maintenir des conditions de travail équitables pour tous nos employés.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="certification-card h-100">
                        <div class="certification-icon">
                            <i class="fas fa-recycle"></i>
                        </div>
                        <h3 class="certification-title">Programme de Durabilité</h3>
                        <p class="certification-text">Notre programme de durabilité inclut des objectifs de réduction des émissions de CO2, d'optimisation des itinéraires et de modernisation continue de notre flotte.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="certification-card h-100">
                        <div class="certification-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="certification-title">Transporteur de l'Année 2023</h3>
                        <p class="certification-text">Nous avons été reconnus comme "Transporteur de l'Année 2023" par la Fédération Marocaine du Transport, récompensant notre excellence et notre innovation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="section-padding cta-section">
        <div class="container">
            <h2 class="cta-title" data-aos="fade-up">Collaborons ensemble</h2>
            <p class="cta-text" data-aos="fade-up" data-aos-delay="100">Que vous ayez besoin d'un transport national ou international, d'une solution logistique complète ou simplement d'un conseil, notre équipe est prête à vous accompagner. Faites confiance à CHICO TRANS pour transformer vos défis logistiques en opportunités de croissance.</p>
            <div data-aos="fade-up" data-aos-delay="200">
                <a href="/devis" class="btn-cta btn-cta-primary">Demander un devis</a>
                <a href="/contactez-nous" class="btn-cta btn-cta-secondary">Nous contacter</a>
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
                    <form>
                        <div class="mb-3">
                            <label for="login-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="login-email" required>
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="login-password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>
                        <div class="text-end mb-3">
                            <a href="#" class="text-decoration-none">Mot de passe oublié?</a>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="background-color: var(--secondary-color); border-color: var(--secondary-color);">Se connecter</button>
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
                    <form>
                        <div class="mb-3">
                            <label for="register-name" class="form-label">Nom complet</label>
                            <input type="text" class="form-control" id="register-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="register-email" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="register-password" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-confirm-password" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="register-confirm-password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms">J'accepte les conditions d'utilisation</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="background-color: var(--secondary-color); border-color: var(--secondary-color);">S'inscrire</button>
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
            duration: 600,
            easing: 'ease-in-out',
            once: true,
            offset: 100,
            delay: 100
        });

        // Counter Animation
        const counterAnimation = () => {
            $('.counter-value').each(function() {
                const $this = $(this);
                const countTo = $this.attr('data-count');
                
                $({countNum: 0}).animate({
                    countNum: countTo
                }, {
                    duration: 1500,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            });
        };
        
        // Animation au scroll
        let counterAnimated = false;
        const statsSection = document.querySelector('.stats-section');
        
        const checkIfInView = () => {
            if (statsSection) {
                const windowHeight = window.innerHeight;
                const elementTop = statsSection.getBoundingClientRect().top;
                
                if (elementTop < windowHeight - 100 && !counterAnimated) {
                    counterAnimation();
                    counterAnimated = true;
                }
            }
        };
        
        // Check on scroll and on page load
        window.addEventListener('scroll', checkIfInView);
        window.addEventListener('load', checkIfInView);
        
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
        
        // Fix timeline on mobile
        const fixTimelineOnMobile = () => {
            if (window.innerWidth < 768) {
                const timelineItems = document.querySelectorAll('.timeline-content');
                timelineItems.forEach(item => {
                    item.style.width = 'calc(100% - 80px)';
                    item.style.marginLeft = '60px';
                    item.style.float = 'right';
                });

                const timelineMarkers = document.querySelectorAll('.timeline-marker');
                timelineMarkers.forEach(marker => {
                    marker.style.left = '16px';
                    marker.style.marginLeft = '0';
                });
            } else {
                const timelineItems = document.querySelectorAll('.timeline-content');
                timelineItems.forEach(item => {
                    if (item.classList.contains('timeline-left')) {
                        item.style.width = 'calc(50% - 40px)';
                        item.style.marginLeft = '0';
                        item.style.float = 'left';
                    } else if (item.classList.contains('timeline-right')) {
                        item.style.width = 'calc(50% - 40px)';
                        item.style.marginLeft = '0';
                        item.style.float = 'right';
                    }
                });

                const timelineMarkers = document.querySelectorAll('.timeline-marker');
                timelineMarkers.forEach(marker => {
                    marker.style.left = '50%';
                    marker.style.marginLeft = '-12px';
                });
            }
        };
        
        // Call on load and resize
        window.addEventListener('load', fixTimelineOnMobile);
        window.addEventListener('resize', fixTimelineOnMobile);
        
        // Add padding to body to account for fixed navbar
        document.addEventListener('DOMContentLoaded', function() {
            const navbarHeight = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbarHeight + 'px';
        });
        
        // Update padding when window is resized
        window.addEventListener('resize', function() {
            const navbarHeight = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbarHeight + 'px';
        });
    </script>
</body>
</html>