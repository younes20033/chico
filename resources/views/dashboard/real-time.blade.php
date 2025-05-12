<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi en temps réel - CHICO TRANS</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
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
        
        /* Tracking Container */
        .tracking-container {
            padding: 2rem 0;
        }
        
        .tracking-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .tracking-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        /* Map Container */
        .map-container {
            width: 100%;
            height: 500px;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        
        #map {
            width: 100%;
            height: 100%;
        }
        
        /* Shipment Details */
        .shipment-details {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .detail-card {
            flex: 1;
            min-width: 200px;
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .detail-icon {
            font-size: 1.5rem;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }
        
        .detail-label {
            font-size: 0.8rem;
            color: var(--grey-color);
            margin-bottom: 0.25rem;
        }
        
        .detail-value {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        /* Tracking Timeline */
        .tracking-timeline {
            position: relative;
            padding-left: 2.5rem;
            margin-top: 2rem;
        }
        
        .tracking-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 8px;
            width: 2px;
            background-color: #e1e1e1;
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
            left: -2.5rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background-color: white;
            border: 2px solid var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .timeline-icon.completed {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .timeline-icon i {
            font-size: 0.6rem;
        }
        
        .timeline-content {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
        }
        
        .timeline-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        
        .timeline-title {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .timeline-date {
            color: var(--grey-color);
            font-size: 0.85rem;
        }
        
        .timeline-location {
            margin-top: 0.25rem;
            font-size: 0.9rem;
            color: var(--grey-color);
        }
        
        /* No Active Shipments */
        .no-shipments {
            text-align: center;
            padding: 3rem 0;
        }
        
        .no-shipments-icon {
            font-size: 3rem;
            color: #e1e1e1;
            margin-bottom: 1rem;
        }
        
        .no-shipments-text {
            color: var(--grey-color);
            margin-bottom: 1.5rem;
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
        }
        
        .btn-cta:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: white;
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
        
        @media (max-width: 767.98px) {
            .map-container {
                height: 300px;
            }
            
            .tracking-title {
                font-size: 1.5rem;
            }
            
            .shipment-details {
                gap: 1rem;
            }
            
            .detail-card {
                min-width: 100%;
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

    <!-- Tracking Content -->
    <div class="tracking-container">
        <div class="container">
            <h1 class="tracking-title">Suivi en temps réel</h1>
            
            <div class="tracking-card">
                <!-- Comme nous n'avons pas encore de données réelles de tracking, on va simuler une page de démo -->
                <div class="no-shipments">
                    <div class="no-shipments-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Aucun transport actif en ce moment</h3>
                    <p class="no-shipments-text">Vous n'avez pas de transports en cours actuellement. Créez un nouveau devis pour démarrer un transport.</p>
                    <a href="{{ route('devis.form') }}" class="btn-cta">
                        <i class="fas fa-plus-circle me-2"></i> Demander un devis
                    </a>
                </div>
                
                
                <h2 class="mb-4">Transport #T-12345</h2>
                
                <div class="map-container">
                    <div id="map"></div>
                </div>
                
                <div class="shipment-details">
                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="detail-label">Date de départ</div>
                        <div class="detail-value">15/05/2025</div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="detail-label">Date d'arrivée estimée</div>
                        <div class="detail-value">17/05/2025</div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="detail-label">Type de véhicule</div>
                        <div class="detail-value">Semi Remorque</div>
                    </div>
                    
                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="detail-label">Statut</div>
                        <div class="detail-value">En transit</div>
                    </div>
                </div>
                
                <h3 class="mt-4 mb-3">Progression du transport</h3>
                
                <div class="tracking-timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon completed">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div class="timeline-title">Prise en charge</div>
                                <div class="timeline-date">15/05/2025 08:30</div>
                            </div>
                            <div class="timeline-text">
                                Le colis a été pris en charge par notre équipe.
                            </div>
                            <div class="timeline-location">
                                <i class="fas fa-map-marker-alt me-1"></i> Casablanca, Maroc
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-icon completed">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div class="timeline-title">En transit</div>
                                <div class="timeline-date">15/05/2025 10:45</div>
                            </div>
                            <div class="timeline-text">
                                Le transport est en cours vers sa destination.
                            </div>
                            <div class="timeline-location">
                                <i class="fas fa-map-marker-alt me-1"></i> Sortie Casablanca, Maroc
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-icon completed">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div class="timeline-title">Point de contrôle</div>
                                <div class="timeline-date">16/05/2025 09:15</div>
                            </div>
                            <div class="timeline-text">
                                Le transport a passé un point de contrôle.
                            </div>
                            <div class="timeline-location">
                                <i class="fas fa-map-marker-alt me-1"></i> Kenitra, Maroc
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div class="timeline-title">En transit</div>
                                <div class="timeline-date">16/05/2025 14:30</div>
                            </div>
                            <div class="timeline-text">
                                Le transport poursuit sa route vers sa destination.
                            </div>
                            <div class="timeline-location">
                                <i class="fas fa-map-marker-alt me-1"></i> Rabat, Maroc
                            </div>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div class="timeline-title">Livraison prévue</div>
                                <div class="timeline-date">17/05/2025 11:00</div>
                            </div>
                            <div class="timeline-text">
                                Livraison prévue chez le destinataire.
                            </div>
                            <div class="timeline-location">
                                <i class="fas fa-map-marker-alt me-1"></i> Tanger, Maroc
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
    
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <script>
        
        // Code pour initialiser la carte quand il y a des transports actifs
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser la carte
            const map = L.map('map').setView([33.5731, -7.5898], 13); // Coordonnées de Casablanca
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            // Ajouter des marqueurs pour la position du véhicule
            const truckIcon = L.icon({
                iconUrl: '/img/truck-icon.png',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            });
            
            // Simuler la position du véhicule
            const marker = L.marker([33.9716, -6.8498], {icon: truckIcon}).addTo(map); // Rabat
            marker.bindPopup("<b>Transport #T-12345</b><br>En transit - Rabat").openPopup();
            
            // Tracer l'itinéraire (simplifié pour l'exemple)
            const route = [
                [33.5731, -7.5898], // Casablanca
                [33.8116, -7.0383], // Midway point
                [33.9716, -6.8498], // Rabat
                [34.2500, -6.5833], // Kenitra
                [35.7595, -5.8340]  // Tanger
            ];
            
            L.polyline(route, {color: 'red'}).addTo(map);
            
            // Ajuster la vue pour montrer tout l'itinéraire
            map.fitBounds(route);
        });
        
    </script>
</body>
</html>