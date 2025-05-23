<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Administration CHICO TRANS</title>
    
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
        
        /* Admin Dashboard Content */
        .admin-container {
            padding: 2rem 0;
        }
        
        .admin-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .admin-subtitle {
            color: var(--grey-color);
            font-size: 1rem;
            margin-bottom: 2rem;
        }
        
        /* Dashboard Stats */
        .stat-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background-color: var(--secondary-color);
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: var(--grey-color);
            margin-bottom: 0;
        }
        
        .stat-icon {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 2.5rem;
            color: rgba(209, 51, 51, 0.1);
        }
        
        /* Admin Cards */
        .admin-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .admin-card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #f1f1f1;
            padding-bottom: 0.75rem;
            display: flex;
            align-items: center;
        }
        
        .admin-card-title i {
            color: var(--secondary-color);
            margin-right: 0.5rem;
        }
        
        .admin-card-title .badge {
            margin-left: auto;
            font-size: 0.7rem;
        }
        
        /* Notifications List */
        .notification-item {
            padding: 1rem;
            border-left: 4px solid var(--secondary-color);
            background-color: #f8f9fa;
            margin-bottom: 1rem;
            border-radius: 0 4px 4px 0;
            position: relative;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .notification-item:hover {
            background-color: #e9ecef;
            transform: translateX(5px);
        }
        
        .notification-item.unread {
            border-left-color: var(--secondary-color);
            background-color: rgba(209, 51, 51, 0.05);
        }
        
        .notification-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
        }
        
        .notification-message {
            color: var(--grey-color);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .notification-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: var(--grey-color);
        }
        
        /* Quick Actions */
        .quick-action-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            border: none;
        }
        
        .quick-action-btn i {
            margin-right: 0.5rem;
        }
        
        .quick-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary-custom {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .btn-primary-custom:hover {
            background-color: #c0392b;
            color: white;
        }
        
        .btn-success-custom {
            background-color: #28a745;
            color: white;
        }
        
        .btn-info-custom {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* Recent Activity */
        .activity-item {
            display: flex;
            align-items: flex-start;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 0.8rem;
        }
        
        .activity-icon.new {
            background-color: rgba(209, 51, 51, 0.1);
            color: var(--secondary-color);
        }
        
        .activity-icon.approved {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .activity-icon.rejected {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-title {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
        }
        
        .activity-description {
            color: var(--grey-color);
            font-size: 0.85rem;
            margin-bottom: 0.25rem;
        }
        
        .activity-time {
            color: var(--grey-color);
            font-size: 0.75rem;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .admin-container {
                padding: 1rem;
            }
            
            .admin-title {
                font-size: 1.5rem;
            }
            
            .stat-value {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 767.98px) {
            .notification-item {
                margin-bottom: 0.5rem;
            }
            
            .quick-action-btn {
                width: 100%;
                justify-content: center;
                margin-right: 0;
            }
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
                            <span class="user-role">Administrateur</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Administration</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
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

    <!-- Admin Dashboard Content -->
    <div class="admin-container">
        <div class="container">
            <div class="mb-4">
                <h1 class="admin-title">Tableau de bord - Administration</h1>
                <p class="admin-subtitle">Bienvenue dans l'espace d'administration de CHICO TRANS</p>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            <!-- Dashboard Stats -->
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-value">{{ $totalUsers }}</div>
                        <div class="stat-label">Utilisateurs totaux</div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-value">{{ $totalClients }}</div>
                        <div class="stat-label">Clients</div>
                        <div class="stat-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-value">{{ $totalDevis }}</div>
                        <div class="stat-label">Devis totaux</div>
                        <div class="stat-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-value">{{ $pendingDevis }}</div>
                        <div class="stat-label">Devis en attente</div>
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- Notifications récentes -->
                <div class="col-lg-8">
                    <div class="admin-card">
                        <h3 class="admin-card-title">
                            <i class="fas fa-bell"></i>
                            Notifications récentes
                            @if($notifications->where('read', false)->count() > 0)
                                <span class="badge bg-danger">{{ $notifications->where('read', false)->count() }}</span>
                            @endif
                        </h3>
                        
                        @if($notifications->count() > 0)
    @foreach($notifications->take(5) as $notification)
        <div class="notification-item {{ !$notification->read ? 'unread' : '' }}" 
             data-notification-id="{{ $notification->id }}"
             data-devis-id="{{ $notification->devis_id ?? '' }}"
             style="cursor: pointer;"
             onclick="handleNotificationClick(this)">
            <div class="notification-title">{{ $notification->title }}</div>
            <div class="notification-message">{{ $notification->message }}</div>
            <div class="notification-meta">
                <span>{{ $notification->created_at->diffForHumans() }}</span>
                @if(!$notification->read)
                    <span class="badge bg-danger">Nouveau</span>
                @endif
            </div>
        </div>
    @endforeach
    
    @if($notifications->count() > 5)
        <div class="text-center mt-3">
            <a href="{{ route('admin.notifications') }}" class="btn btn-outline-primary btn-sm">
                Voir toutes les notifications
            </a>
        </div>
    @endif
@else
    <div class="text-center text-muted py-4">
        <i class="fas fa-bell-slash fa-2x mb-3"></i>
        <p>Aucune notification pour le moment</p>
    </div>
@endif
                    </div>
                </div>
                
                <!-- Actions rapides -->
                <div class="col-lg-4">
                    <div class="admin-card">
                        <h3 class="admin-card-title">
                            <i class="fas fa-bolt"></i>
                            Actions rapides
                        </h3>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.devis.new') }}" class="quick-action-btn btn-primary-custom">
                                <i class="fas fa-file-invoice"></i>
                                Nouveaux devis ({{ $pendingDevis }})
                            </a>
                            
                            <a href="{{ route('admin.users.create') }}" class="quick-action-btn btn-success-custom">
                                <i class="fas fa-user-plus"></i>
                                Ajouter un utilisateur
                            </a>
                            
                            <a href="{{ route('admin.users') }}" class="quick-action-btn btn-info-custom">
                                <i class="fas fa-users-cog"></i>
                                Gérer les utilisateurs
                            </a>
                            
                            <a href="{{ route('admin.devis') }}" class="quick-action-btn btn-info-custom">
                                <i class="fas fa-list"></i>
                                Tous les devis
                            </a>
                        </div>
                    </div>
                    
                    <!-- Activité récente -->
                    <div class="admin-card">
                        <h3 class="admin-card-title">
                            <i class="fas fa-history"></i>
                            Activité récente
                        </h3>
                        
                        @if($recentDevis->count() > 0)
                            @foreach($recentDevis->take(4) as $devis)
                                <div class="activity-item">
                                    <div class="activity-icon {{ $devis->status == 'pending' ? 'new' : ($devis->status == 'approved' ? 'approved' : 'rejected') }}">
                                        <i class="fas {{ $devis->status == 'pending' ? 'fa-plus' : ($devis->status == 'approved' ? 'fa-check' : 'fa-times') }}"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Devis #{{ $devis->reference }}</div>
                                        <div class="activity-description">{{ $devis->contact_name }} - {{ $devis->company_name }}</div>
                                        <div class="activity-time">{{ $devis->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center text-muted py-3">
                                <i class="fas fa-history fa-2x mb-2"></i>
                                <p class="mb-0">Aucune activité récente</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
    function handleNotificationClick(element) {
        const notificationId = element.getAttribute('data-notification-id');
        
        if (!notificationId) {
            console.error('ID de notification manquant');
            return;
        }
        
        // Désactiver le clic pendant le traitement
        element.style.pointerEvents = 'none';
        element.style.opacity = '0.7';
        
        fetch(`{{ url('/admin/notifications') }}/${notificationId}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => {
            if (response.ok) {
                // Marquer comme lu visuellement
                element.classList.remove('unread');
                
                // Rediriger vers les nouveaux devis
                window.location.href = '{{ route("admin.devis.new") }}';
            } else {
                throw new Error('Erreur de réseau');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            
            // Restaurer l'état
            element.style.pointerEvents = 'auto';
            element.style.opacity = '1';
            
            alert('Erreur lors de la mise à jour. Veuillez réessayer.');
        });
    }
</script>
</body>
</html>