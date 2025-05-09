<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - CHICO TRANS</title>
    
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
        
        /* Professional Dashboard Styles */
        .breadcrumb {
            padding: 0;
            margin-bottom: 1.5rem;
            background-color: transparent;
            font-size: 0.85rem;
        }

        .breadcrumb-item a {
            color: var(--secondary-color);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--grey-color);
        }

        /* Welcome Card */
        .welcome-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .welcome-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .welcome-subtitle {
            color: var(--grey-color);
            font-size: 1rem;
            margin-bottom: 0;
        }

        .quick-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .quick-action-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            color: var(--primary-color);
            background-color: #f5f5f5;
            border: 1px solid #e1e1e1;
        }

        .quick-action-btn i {
            margin-right: 0.5rem;
        }

        .quick-action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: var(--primary-color);
        }

        .quick-action-primary {
            background-color: var(--secondary-color);
            color: white;
            border: none;
        }

        .quick-action-primary:hover {
            color: white;
            background-color: #c0392b;
        }

        /* Stat Cards */
        .stats-row {
            margin-bottom: 1.5rem;
        }

        .stat-card-pro {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
        }

        .stat-card-pro:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .stat-icon-primary {
            background-color: rgba(209, 51, 51, 0.1);
            color: var(--secondary-color);
        }

        .stat-icon-warning {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .stat-icon-success {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .stat-icon-info {
            background-color: rgba(23, 162, 184, 0.1);
            color: #17a2b8;
        }

        .stat-card-info {
            margin-bottom: 1rem;
        }

        .stat-card-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
            line-height: 1;
        }

        .stat-card-text {
            font-size: 0.85rem;
            color: var(--grey-color);
        }

        .stat-card-progress {
            height: 4px;
            background-color: #f1f1f1;
            border-radius: 2px;
            margin-bottom: 0.75rem;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            border-radius: 2px;
        }

        .progress-primary {
            background-color: var(--secondary-color);
        }

        .progress-warning {
            background-color: #ffc107;
        }

        .progress-success {
            background-color: #28a745;
        }

        .progress-info {
            background-color: #17a2b8;
        }

        .stat-card-footer {
            font-size: 0.75rem;
            color: var(--grey-color);
            margin-top: auto;
        }

        .stat-trend-up {
            color: #28a745;
            font-weight: 500;
            margin-right: 0.25rem;
        }

        .stat-trend-down {
            color: var(--secondary-color);
            font-weight: 500;
            margin-right: 0.25rem;
        }

        .stat-trend-steady {
            color: #17a2b8;
            font-weight: 500;
            margin-right: 0.25rem;
        }

        /* Dashboard Widgets */
        .dashboard-widget {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            height: 100%;
            margin-bottom: 1.5rem;
        }

        .widget-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f1f1f1;
        }

        .widget-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0;
            display: flex;
            align-items: center;
        }

        .widget-title i {
            color: var(--secondary-color);
            margin-right: 0.5rem;
            font-size: 1rem;
        }

        .widget-controls {
            display: flex;
            gap: 0.5rem;
        }

        .widget-control-btn {
            background-color: transparent;
            border: none;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            color: var(--grey-color);
            font-size: 0.85rem;
        }

        .widget-control-btn:hover {
            background-color: #f5f5f5;
            color: var(--primary-color);
        }

        .widget-body {
            padding: 1.5rem;
        }

        .widget-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid #f1f1f1;
        }

        .widget-view-all {
            color: var(--secondary-color);
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
        }

        .widget-view-all:hover {
            text-decoration: underline;
            color: var(--secondary-color);
        }

        /* Activity Timeline */
        .activity-timeline {
            position: relative;
            padding-left: 28px;
        }

        .activity-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 8px;
            width: 2px;
            background-color: #f1f1f1;
            z-index: 0;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-icon {
            position: absolute;
            left: -28px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.6rem;
            z-index: 1;
        }
        
        .timeline-content {
            padding-left: 1rem;
            position: relative;
        }

        .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.25rem;
        }

        .timeline-title {
            font-weight: 500;
            color: var(--primary-color);
        }

        .timeline-date {
            font-size: 0.75rem;
            color: var(--grey-color);
        }

        .timeline-text {
            font-size: 0.85rem;
            color: var(--dark-grey-color);
            margin-bottom: 0.5rem;
        }

        .timeline-actions {
            margin-top: 0.25rem;
        }

        .timeline-action-btn {
            font-size: 0.75rem;
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .timeline-action-btn:hover {
            text-decoration: underline;
            color: var(--secondary-color);
        }

        /* Quick Links Widget */
        .quick-links {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .quick-link-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .quick-link-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .quick-link-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }

        .quick-link-text {
            flex-grow: 1;
        }

        .quick-link-text h4 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.2rem;
        }

        .quick-link-text p {
            font-size: 0.75rem;
            color: var(--grey-color);
            margin-bottom: 0;
        }

        .quick-link-arrow {
            color: var(--grey-color);
            font-size: 0.75rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .welcome-card {
                padding: 1.5rem;
            }
            
            .quick-actions {
                justify-content: flex-start;
                margin-top: 1rem;
            }
        }

        @media (max-width: 767.98px) {
            .welcome-title {
                font-size: 1.5rem;
            }
            
            .stat-card-pro {
                margin-bottom: 1rem;
            }
        }

        /* CSS Variables */
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #d13333;
            --grey-color: #6c757d;
            --dark-grey-color: #495057;
            --light-bg: #f8f9fa;
        }

        /* Additional Utils */
        .bg-primary {
            background-color: var(--primary-color) !important;
        }

        .bg-secondary {
            background-color: var(--secondary-color) !important;
        }

        .text-primary {
            color: var(--primary-color) !important;
        }

        .text-secondary {
            color: var(--secondary-color) !important;
        }

        .dashboard-container {
            padding: 2rem 0;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Animations */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .animate-pulse {
            animation: pulse 2s infinite;
        }

        /* Badges personnalisés */
        .badge {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 500;
        }

        /* Boutons personnalisés supplémentaires */
        .btn-outline-primary {
            color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: #b92c2c;
            border-color: #b92c2c;
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
                <a href="/devis" class="btn-devis ms-3">DEMANDER UN DEVIS</a>
            </div>
        </div>
    </nav>

   <div class="dashboard-container">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
            </ol>
        </nav>

        <!-- Welcome Header Card -->
        <div class="welcome-card mb-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="welcome-title">Bonjour, {{ Auth::user()->name }}</h1>
                    <p class="welcome-subtitle">Voici un aperçu de votre activité avec CHICO TRANS</p>
                </div>
                <div class="col-lg-6">
                    <div class="quick-actions">
                        <a href="{{ route('profile') }}" class="quick-action-btn">
                            <i class="fas fa-user-edit"></i> Éditer profil
                        </a>
                        <a href="{{ route('devis.form') }}" class="quick-action-btn quick-action-primary">
                            <i class="fas fa-file-invoice"></i> Nouveau devis
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Dashboard Cards -->
        <div class="row stats-row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="stat-card-pro">
                    <div class="stat-card-icon stat-icon-primary">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="stat-card-info">
                        <div class="stat-card-number">12</div>
                        <div class="stat-card-text">Devis générés</div>
                    </div>
                    <div class="stat-card-progress">
                        <div class="progress-bar progress-primary" style="width: 75%"></div>
                    </div>
                    <div class="stat-card-footer">
                        <span class="stat-trend-up"><i class="fas fa-arrow-up"></i> 15%</span> depuis le mois dernier
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="stat-card-pro">
                    <div class="stat-card-icon stat-icon-warning">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="stat-card-info">
                        <div class="stat-card-number">8</div>
                        <div class="stat-card-text">Transports en cours</div>
                    </div>
                    <div class="stat-card-progress">
                        <div class="progress-bar progress-warning" style="width: 60%"></div>
                    </div>
                    <div class="stat-card-footer">
                        <span class="stat-trend-up"><i class="fas fa-arrow-up"></i> 8%</span> depuis le mois dernier
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="stat-card-pro">
                    <div class="stat-card-icon stat-icon-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-card-info">
                        <div class="stat-card-number">25</div>
                        <div class="stat-card-text">Transports complétés</div>
                    </div>
                    <div class="stat-card-progress">
                        <div class="progress-bar progress-success" style="width: 85%"></div>
                    </div>
                    <div class="stat-card-footer">
                        <span class="stat-trend-up"><i class="fas fa-arrow-up"></i> 22%</span> depuis le mois dernier
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="stat-card-pro">
                    <div class="stat-card-icon stat-icon-info">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-card-info">
                        <div class="stat-card-number">4.8</div>
                        <div class="stat-card-text">Note moyenne</div>
                    </div>
                    <div class="stat-card-progress">
                        <div class="progress-bar progress-info" style="width: 95%"></div>
                    </div>
                    <div class="stat-card-footer">
                        <span class="stat-trend-steady"><i class="fas fa-equals"></i> Stable</span> depuis le mois dernier
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="row">
            <!-- Activity Timeline -->
            <div class="col-12">
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h2 class="widget-title">
                            <i class="fas fa-chart-line"></i> Activité récente
                        </h2>
                        <div class="widget-controls">
                            <div class="dropdown">
                                <button class="widget-control-btn dropdown-toggle" type="button" id="activityDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="activityDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-sync-alt me-2"></i> Actualiser</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-expand-alt me-2"></i> Voir tout</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Paramètres</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="activity-timeline">
                            <div class="timeline-item">
                                <div class="timeline-icon bg-primary">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-header">
                                        <span class="timeline-title">Devis #12345 généré</span>
                                        <span class="timeline-date">05/05/2025</span>
                                    </div>
                                    <div class="timeline-text">
                                        Transport de marchandises vers Rabat pour un montant de 2500 DH
                                    </div>
                                    <div class="timeline-actions">
                                        <a href="#" class="timeline-action-btn">Voir détails</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-icon bg-warning">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-header">
                                        <span class="timeline-title">Transport #T-98765 en cours</span>
                                        <span class="timeline-date">03/05/2025</span>
                                    </div>
                                    <div class="timeline-text">
                                        Départ: Casablanca, Destination: Rabat - Livraison prévue: 12/05/2025
                                    </div>
                                    <div class="timeline-actions">
                                        <a href="#" class="timeline-action-btn">Suivi en temps réel</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-icon bg-success">
                                    <i class="fas fa-user-edit"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-header">
                                        <span class="timeline-title">Profil mis à jour</span>
                                        <span class="timeline-date">02/05/2025</span>
                                    </div>
                                    <div class="timeline-text">
                                        Informations de contact et préférences de notification mises à jour
                                    </div>
                                    <div class="timeline-actions">
                                        <a href="{{ route('profile') }}" class="timeline-action-btn">Voir profil</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-icon bg-info">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-header">
                                        <span class="timeline-title">Transport #T-87654 complété</span>
                                        <span class="timeline-date">28/04/2025</span>
                                    </div>
                                    <div class="timeline-text">
                                        Livraison effectuée à Marrakech avec succès
                                    </div>
                                    <div class="timeline-actions">
                                        <a href="#" class="timeline-action-btn">Voir détails</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="widget-footer text-center">
                            <a href="#" class="widget-view-all">Voir toutes les activités <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Links Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h2 class="widget-title">
                            <i class="fas fa-link"></i> Accès rapides
                        </h2>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('devis.form') }}" class="quick-link-item">
                                    <div class="quick-link-icon bg-primary">
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                    <div class="quick-link-text">
                                        <h4>Demander un devis</h4>
                                        <p>Obtenez un devis personnalisé rapidement</p>
                                    </div>
                                    <div class="quick-link-arrow">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('devis.history') }}" class="quick-link-item">
                                    <div class="quick-link-icon bg-info">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <div class="quick-link-text">
                                        <h4>Historique des devis</h4>
                                        <p>Consultez vos devis précédents</p>
                                    </div>
                                    <div class="quick-link-arrow">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('real.time') }}" class="quick-link-item">
                                    <div class="quick-link-icon bg-success">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <div class="quick-link-text">
                                        <h4>Suivi en temps réel</h4>
                                        <p>Localisez vos transports en direct</p>
                                    </div>
                                    <div class="quick-link-arrow">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Action Cards -->
        <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h2 class="widget-title">
                            <i class="fas fa-truck-loading"></i> Services disponibles
                        </h2>
                    </div>
                    <div class="widget-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-truck text-secondary me-2"></i>
                                    Transport national
                                </div>
                                <a href="/services#transport-national" class="btn btn-sm btn-outline-primary">En savoir plus</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-globe-africa text-secondary me-2"></i>
                                    Transport international
                                </div>
                                <a href="/services#transport-international" class="btn btn-sm btn-outline-primary">En savoir plus</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-boxes text-secondary me-2"></i>
                                    Logistique complète
                                </div>
                                <a href="/services#logistique-complete" class="btn btn-sm btn-outline-primary">En savoir plus</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-warehouse text-secondary me-2"></i>
                                    Stockage temporaire
                                </div>
                                <a href="/services#stockage-temporaire" class="btn btn-sm btn-outline-primary">En savoir plus</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h2 class="widget-title">
                            <i class="fas fa-info-circle"></i> Besoin d'aide ?
                        </h2>
                    </div>
                    <div class="widget-body">
                        <div class="p-2 text-center mb-4">
                            
                            <h5 class="mb-3">Nous sommes là pour vous aider</h5>
                            <p class="mb-4">Vous avez une question ou besoin d'assistance avec votre compte ou vos transports ?</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="/contactez-nous" class="btn btn-primary">
                                    <i class="fas fa-envelope me-1"></i> Nous contacter
                                </a>
                                
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