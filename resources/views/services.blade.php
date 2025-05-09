<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Services - CHICO TRANS</title>
    
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

        /* Services Hero Section */
        .services-hero {
            position: relative;
            height: 50vh;
            min-height: 350px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('/img13.jpeg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            margin-top: 75px;
        }
        
        .services-hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .services-hero-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            animation: fadeInDown 1s ease;
        }
        
        .services-hero-content p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease 0.3s;
            animation-fill-mode: both;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Section Styling */
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
        
        /* Service Overview Section */
        .service-overview-text {
            color: var(--grey-color);
            line-height: 1.8;
            font-size: 1rem;
            text-align: center;
            max-width: 800px;
            margin: 0 auto 2rem;
        }
        
       
        
        /* Services Slider Navigation */
        .services-slider {
            position: relative;
            margin-bottom: 40px;
        }
        
        .services-nav {
            position: relative;
            display: flex;
            width: auto;
            overflow-x: auto;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE/Edge */
            -webkit-overflow-scrolling: touch;
            padding: 0 ;
            background-color: white;
            border-radius: 0px;
            
        }
        
        .services-nav::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
        
        .services-nav .nav-item {
            flex: 1;
            white-space: nowrap;
            background-color: white;
            text-align: center;
            
            
        }
        
        .services-nav .nav-link {
            border: none;
            background: transparent;
            color: var(--primary-color);
            font-weight: 600;
            font-size: 0.9rem;
            padding: 15px 20px;
            position: relative;
            transition: all 0.3s ease;
            border-radius: 50px;
        }
        
        .services-nav .nav-link.active {
            color: white;
            background-color: var(--secondary-color);
            box-shadow: 0 4px 10px rgba(209, 51, 51, 0.3);
        }
        
        .services-nav .nav-link i {
            margin-right: 8px;
            font-size: 1rem;
            color: var(--secondary-color);
            vertical-align: middle;
        }
        
        .services-nav .nav-link.active i {
            color: white;
        }
        
        
        
        /* Tab Content */
        .tab-pane {
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .tab-pane-img {
            width: 100%;
            height: 500px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .tab-pane-img::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background-color: var(--secondary-color);
        }
        
        .tab-pane-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .tab-pane-title {
            color: var(--primary-color);
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .tab-pane-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--secondary-color);
        }
        
        .tab-pane-text {
            color: var(--grey-color);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        
        .feature-list {
            list-style: none;
            padding-left: 0;
            margin-top: 2rem;
            border-top: 1px solid #f1f1f1;
            padding-top: 1.5rem;
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
            color: var(--dark-color);
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .feature-item:hover {
            transform: translateX(5px);
            background-color: #f1f1f1;
        }
        
        .feature-icon {
            color: var(--secondary-color);
            margin-right: 1rem;
            font-size: 1.2rem;
            margin-top: 0.1rem;
        }
        
        /* Process Section */
        .process-steps {
            position: relative;
        }
        
        .process-steps::before {
            content: '';
            position: absolute;
            top: 2rem;
            left: 15%;
            right: 15%;
            height: 2px;
            background-color: #e0e0e0;
            z-index: 0;
        }
        
        .process-step {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background-color: var(--secondary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.5rem;
            margin: 0 auto 1.25rem;
            position: relative;
            z-index: 1;
            box-shadow: 0 5px 15px rgba(209, 51, 51, 0.3);
        }
        
        .step-title {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
        }
        
        .step-text {
            color: var(--grey-color);
            font-size: 0.9rem;
            padding: 0 10px;
        }
        
        /* Testimonials */
        .testimonial-item {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            height: 100%;
            transition: all 0.3s;
        }
        
        .testimonial-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .testimonial-content {
            position: relative;
            margin-bottom: 1.5rem;
            padding-left: 2rem;
        }
        
        .testimonial-content::before {
            content: '\f10d';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 0;
            color: var(--secondary-color);
            opacity: 0.3;
            font-size: 1.2rem;
        }
        
        .testimonial-text {
            color: var(--grey-color);
            line-height: 1.6;
            font-style: italic;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 1rem;
            border: 2px solid var(--secondary-color);
        }
        
        .author-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .author-info h4 {
            color: var(--primary-color);
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }
        
        .author-company {
            color: var(--secondary-color);
            font-size: 0.85rem;
        }
        
        /* CTA Section */
        .cta-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('/photo.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 5rem 0;
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
        
        @media (max-width: 767.98px) {
            .cta-title {
                font-size: 1.6rem;
            }
            
            .cta-text {
                font-size: 0.95rem;
            }
            
            .btn-cta {
                width: 80%;
                margin-bottom: 0.5rem;
            }
        }
        
        /* FAQ Section */
        .accordion-item {
            margin-bottom: 1rem;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }
        
        .accordion-button {
            padding: 1.25rem;
            font-weight: 600;
            font-size: 1rem;
            color: var(--primary-color);
            background-color: white;
        }
        
        .accordion-button:not(.collapsed) {
            color: var(--secondary-color);
            background-color: white;
            box-shadow: none;
        }
        
        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(0, 0, 0, 0.125);
        }
        
        .accordion-button::after {
            background-size: 16px;
            transition: all 0.3s;
        }
        
        .accordion-body {
            padding: 1.25rem;
            color: var(--grey-color);
            line-height: 1.8;
            border-top: 1px solid #f1f1f1;
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
        
        /* Modal submit button */
        .btn-submit {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        
        .btn-submit:hover {
            background-color: #c0392b;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .services-hero {
                margin-top: 72px;
                height: 45vh;
            }
            
            .services-hero-content h1 {
                font-size: 2rem;
            }
            
            .process-steps::before {
                display: none;
            }
            
            .service-card-img {
                height: 180px;
            }
            
            .services-nav .nav-link {
                padding: 12px 15px;
                font-size: 0.8rem;
            }
            
            .services-nav .nav-link i {
                margin-right: 5px;
                font-size: 0.9rem;
            }
            
            .slider-control {
                width: 30px;
                height: 30px;
            }
        }
        
        @media (max-width: 767.98px) {
            .services-hero {
                height: 40vh;
                min-height: 300px;
            }
            
            .services-hero-content h1 {
                font-size: 1.8rem;
            }
            
            .services-hero-content p {
                font-size: 0.95rem;
            }
            
            .section-padding {
                padding: 3rem 0;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .service-overview-text {
                font-size: 0.9rem;
            }
            
            .cta-buttons {
                flex-direction: column;
            }
            
            .cta-buttons .btn-cta {
                width: 100%;
                margin-bottom: 0.75rem;
            }
            
            .testimonial-item {
                margin-bottom: 1rem;
            }
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
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle active" href="/services" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    <!-- Services Hero Section -->
    <section class="services-hero">
        <div class="container">
            <div class="services-hero-content">
                <h1>NOS SERVICES DE TRANSPORT</h1>
                <p>Des solutions logistiques adaptées à tous vos besoins de transport national et international</p>
            </div>
        </div>
    </section>

    

    <!-- Service Details Tabs Section -->
    <section id="service-details" class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Détails de nos services</h2>
            
           
                <!-- Navigation des onglets -->
                <ul class="nav services-nav" id="servicesTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="national-tab" data-bs-toggle="tab" data-bs-target="#national" type="button" role="tab" aria-controls="national" aria-selected="true">
                            <i class="fas fa-truck"></i> Transport national
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="international-tab" data-bs-toggle="tab" data-bs-target="#international" type="button" role="tab" aria-controls="international" aria-selected="false">
                            <i class="fas fa-globe"></i> Transport international
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="logistique-tab" data-bs-toggle="tab" data-bs-target="#logistique" type="button" role="tab" aria-controls="logistique" aria-selected="false">
                            <i class="fas fa-dolly"></i> Logistique complète
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="stockage-tab" data-bs-toggle="tab" data-bs-target="#stockage" type="button" role="tab" aria-controls="stockage" aria-selected="false">
                            <i class="fas fa-boxes"></i> Stockage temporaire
                        </button>
                    </li>
                    
                    
                </ul>
                
               
            
            <div class="tab-content bg-white p-4 rounded shadow-sm mt-4" id="servicesTabsContent">
                <div class="tab-pane fade show active" id="national" role="tabpanel" aria-labelledby="national-tab">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="tab-pane-img">
                                <img src="/img15.jpeg" alt="Transport national détail">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="tab-pane-title">Transport national</h3>
                            <p class="tab-pane-text">
                                Notre service de transport national vous garantit une couverture complète du territoire français. Que vous ayez besoin de livrer des marchandises en centre-ville ou dans des zones reculées, notre flotte diversifiée et nos chauffeurs expérimentés s'adaptent à toutes les situations.
                            </p>
                            <p class="tab-pane-text">
                                Nous proposons différents types de véhicules, du petit utilitaire au poids lourd, pour répondre précisément à vos besoins. Notre système de tracking permet un suivi en temps réel de vos expéditions.
                            </p>
                            <ul class="feature-list">
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Livraison dans toute la France métropolitaine
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Tracking en temps réel de vos colis
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Flotte de véhicules variée pour tous types de marchandises
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Respect des délais garantis
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Service client dédié pour le suivi de vos expéditions
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="international" role="tabpanel" aria-labelledby="international-tab">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="tab-pane-img">
                                <img src="/img16.jpeg" alt="Transport international détail">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="tab-pane-title">Transport international</h3>
                            <p class="tab-pane-text">
                                Avec CHICO TRANS, le monde devient votre marché. Notre service de transport international vous ouvre les portes de l'Europe et au-delà. Nous prenons en charge toutes les formalités douanières et les documents nécessaires pour assurer une livraison fluide de vos marchandises.
                            </p>
                            <p class="tab-pane-text">
                                Notre réseau de partenaires locaux dans chaque pays nous permet d'offrir un service de qualité, avec une connaissance approfondie des spécificités locales. Que ce soit pour des livraisons régulières ou des envois ponctuels, nous vous garantissons des tarifs compétitifs.
                            </p>
                            <ul class="feature-list">
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Couverture de toute l'Europe et au-delà
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Gestion complète des formalités douanières
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Réseau de partenaires locaux dans chaque pays
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Transport multimodal (routier, maritime, aérien)
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Assurance complète de vos marchandises
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="logistique" role="tabpanel" aria-labelledby="logistique-tab">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="tab-pane-img">
                                <img src="/img17.jpeg" alt="Logistique complète détail">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="tab-pane-title">Logistique complète</h3>
                            <p class="tab-pane-text">
                                Notre service de logistique complète va bien au-delà du simple transport. Nous prenons en charge l'ensemble de votre chaîne logistique, de l'enlèvement à la livraison finale, en passant par le stockage temporaire si nécessaire. Nos experts analysent vos besoins et vous proposent des solutions sur mesure.
                            </p>
                            <p class="tab-pane-text">
                                Grâce à notre plateforme digitale, vous bénéficiez d'une visibilité totale sur l'ensemble de votre chaîne logistique. Vous pouvez suivre en temps réel le statut de vos commandes, gérer vos stocks et accéder à des rapports détaillés.
                            </p>
                            <ul class="feature-list">
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Gestion de bout en bout de la chaîne logistique
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Solutions personnalisées selon votre secteur d'activité
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Plateforme digitale pour le suivi en temps réel
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Optimisation continue des flux logistiques
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Rapports détaillés et analyses statistiques
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="stockage" role="tabpanel" aria-labelledby="stockage-tab">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="tab-pane-img">
                                <img src="/img18.jpeg" alt="Stockage temporaire détail">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="tab-pane-title">Stockage temporaire</h3>
                            <p class="tab-pane-text">
                                Nos entrepôts modernes et sécurisés vous offrent des solutions de stockage temporaire adaptées à tous types de marchandises. Que vous ayez besoin d'un espace de stockage pour quelques jours ou plusieurs mois, nous vous proposons des formules flexibles et sans engagement.
                            </p>
                            <p class="tab-pane-text">
                                Notre système de gestion d'entrepôt garantit une traçabilité totale de vos produits. Chaque entrée et sortie est scrupuleusement enregistrée, et vous pouvez accéder à l'état de vos stocks en temps réel via notre plateforme en ligne.
                            </p>
                            <ul class="feature-list">
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Entrepôts sécurisés et surveillés 24/7
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Gestion des stocks en temps réel
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Solutions de stockage adaptées à tous types de produits
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Entrepôts à température contrôlée disponibles
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Formules flexibles sans engagement
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="express" role="tabpanel" aria-labelledby="express-tab">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="tab-pane-img">
                                <img src="/detail-express.jpg" alt="Livraison express détail">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="tab-pane-title">Livraison express</h3>
                            <p class="tab-pane-text">
                                Quand chaque minute compte, notre service de livraison express est la solution. Disponible 24h/24 et 7j/7, nous mettons tout en œuvre pour livrer vos marchandises urgentes dans les délais les plus courts possibles. Notre flotte dédiée et nos chauffeurs spécialisés sont formés pour répondre aux situations d'urgence.
                            </p>
                            <p class="tab-pane-text">
                                Nous proposons différentes options d'express, du même jour au lendemain, selon vos contraintes. Chaque livraison express bénéficie d'un suivi prioritaire et d'une communication renforcée, vous tenant informé à chaque étape du transport.
                            </p>
                            <ul class="feature-list">
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Service disponible 24/7, 365 jours par an
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Options de livraison le jour même
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Suivi prioritaire et notifications en temps réel
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Véhicules dédiés pour les livraisons urgentes
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Garantie de délai avec remboursement en cas de retard
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="specialises" role="tabpanel" aria-labelledby="specialises-tab">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="tab-pane-img">
                                <img src="/detail-specialises.jpg" alt="Transports spécialisés détail">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="tab-pane-title">Transports spécialisés</h3>
                            <p class="tab-pane-text">
                                Certaines marchandises requièrent une attention particulière. Notre service de transports spécialisés est conçu pour répondre aux exigences les plus spécifiques. Que vous ayez besoin de transporter des produits fragiles, dangereux, réfrigérés, volumineux ou de grande valeur, nous disposons de l'équipement et de l'expertise nécessaires.
                            </p>
                            <p class="tab-pane-text">
                                Nos chauffeurs sont formés aux procédures spécifiques pour chaque type de transport spécialisé, et nos véhicules sont équipés des dernières technologies pour garantir la sécurité et l'intégrité de vos marchandises.
                            </p>
                            <ul class="feature-list">
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Transport de marchandises dangereuses (ADR)
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Véhicules frigorifiques pour produits sensibles à la température
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Transport de charges lourdes et oversized
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Solutions sécurisées pour objets de valeur
                                </li>
                                <li class="feature-item">
                                    <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                    Conformité avec toutes les réglementations en vigueur
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
     <!-- Process Section -->
     <section id="process" class="section-padding section-dark">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Notre processus de travail</h2>
            <div class="row process-steps">
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h3 class="step-title">Demande</h3>
                        <p class="step-text">Contactez-nous pour présenter vos besoins spécifiques.</p>
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h3 class="step-title">Étude</h3>
                        <p class="step-text">Nos experts analysent votre demande et élaborent une solution sur mesure.</p>
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h3 class="step-title">Proposition</h3>
                        <p class="step-text">Nous vous présentons notre offre détaillée avec tarifs et délais.</p>
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h3 class="step-title">Prise en charge</h3>
                        <p class="step-text">Notre équipe organise et exécute le transport selon le plan établi.</p>
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="process-step">
                        <div class="step-number">5</div>
                        <h3 class="step-title">Suivi</h3>
                        <p class="step-text">Suivez l'avancement de votre expédition via notre plateforme.</p>
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                    <div class="process-step">
                        <div class="step-number">6</div>
                        <h3 class="step-title">Livraison</h3>
                        <p class="step-text">Nous livrons dans les délais convenus et confirmons la bonne réception.</p>
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
                    <h2 class="cta-title" data-aos="fade-up">Prêt à optimiser votre logistique ?</h2>
                    <p class="cta-text" data-aos="fade-up" data-aos-delay="100">Contactez-nous dès aujourd'hui pour discuter de vos besoins en transport et obtenir une solution personnalisée et compétitive.</p>
                    <div class="cta-buttons" data-aos="fade-up" data-aos-delay="200">
                        <a href="/devis" class="btn-cta">Demander un devis</a>
                        <a href="/contactez-nous" class="btn-cta btn-cta-outline">Nous contacter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="section-padding section-dark">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Questions fréquentes</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionFAQ" data-aos="fade-up" data-aos-delay="100">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Quels sont vos délais de livraison habituels ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    Nos délais de livraison varient en fonction de la distance et du type de service choisi. Pour le transport national, nous proposons généralement des délais de 24 à 48h. Pour les livraisons express, nous pouvons assurer une livraison le jour même selon la localisation. Pour le transport international, les délais dépendent du pays de destination et sont précisés lors de l'établissement du devis.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Comment puis-je suivre ma commande ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    Toutes nos expéditions sont équipées d'un système de suivi en temps réel. Dès la prise en charge de votre commande, vous recevez un code de suivi qui vous permet d'accéder à notre plateforme en ligne. Vous pouvez ainsi visualiser la position actuelle de votre colis, les étapes franchies et l'heure estimée de livraison. Vous recevez également des notifications automatiques à chaque étape clé du transport.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Quels types de marchandises pouvez-vous transporter ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    Nous disposons d'une flotte diversifiée qui nous permet de transporter pratiquement tous types de marchandises : colis standards, palettes, produits volumineux, charges lourdes, produits fragiles, marchandises dangereuses (ADR), produits réfrigérés ou congelés, etc. Nous adaptons notre solution en fonction de la nature de vos produits pour garantir leur intégrité tout au long du transport.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Comment sont calculés vos tarifs ?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    Nos tarifs sont établis en fonction de plusieurs critères : la distance parcourue, le poids et les dimensions des marchandises, le type de service choisi (standard, express, etc.), les éventuelles contraintes spécifiques (température contrôlée, manipulation particulière, etc.) et la saisonnalité. Nous vous proposons un devis transparent détaillant chaque composante du prix. Pour les clients réguliers, nous proposons des tarifs préférentiels et des forfaits adaptés à leurs besoins.
                                </div>
                            </div>
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
            duration: 600,
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
        
        // Switch tab function
        function switchTab(tabId) {
            const tabEl = document.querySelector('#' + tabId);
            bootstrap.Tab.getOrCreateInstance(tabEl).show();
            
            // Scroll to tabs section
            const tabsSection = document.querySelector('#service-details');
            const navbarHeight = document.querySelector('.navbar').offsetHeight;
            
            window.scrollTo({
                top: tabsSection.offsetTop - navbarHeight - 20,
                behavior: 'smooth'
            });
        }
        
        // Slider navigation for tabs
        const sliderNav = document.querySelector('.services-nav');
        const prevBtn = document.querySelector('.slider-control.prev');
        const nextBtn = document.querySelector('.slider-control.next');
        
        prevBtn.addEventListener('click', function() {
            sliderNav.scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });
        
        nextBtn.addEventListener('click', function() {
            sliderNav.scrollBy({
                left: 200,
                behavior: 'smooth'
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
            
            // Find active tab from URL hash if present
            if (window.location.hash) {
                const tabId = window.location.hash.replace('#', '');
                if (document.getElementById(tabId + '-tab')) {
                    switchTab(tabId + '-tab');
                }
            }
        });
    </script>
</body>
</html>