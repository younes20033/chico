<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - CHICO TRANS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4d4d4d;
            --secondary-color: #d13333;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .navbar {
            background-color: white !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .navbar-brand img {
            height: 40px;
        }
        
        .btn-logout {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }
        
        .btn-logout:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--secondary-color);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-color);
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        
        .admin-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }
        
        .admin-card h5 {
            color: var(--primary-color);
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .btn-admin {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-admin:hover {
            background-color: #c0392b;
            color: white;
            transform: translateY(-2px);
        }
        
        .devis-item {
            padding: 0.75rem;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin-bottom: 0.5rem;
            border-left: 3px solid var(--secondary-color);
            transition: all 0.3s ease;
        }
        
        .devis-item:hover {
            background-color: #e9ecef;
            transform: translateX(5px);
        }
        
        .badge-pending {
            background-color: #ffc107;
            color: #212529;
        }
        
        .badge-approved {
            background-color: #28a745;
        }
        
        .badge-rejected {
            background-color: #dc3545;
        }
        
        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        
        .quick-stats {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }
        
        .quick-stats .row {
            align-items: center;
        }
        
        .quick-stat-item {
            text-align: center;
            padding: 1rem 0;
        }
        
        .quick-stat-number {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--secondary-color);
        }
        
        .quick-stat-label {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1rem;
        }
        
        .activity-icon.new {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }
        
        .activity-icon.approved {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
        }
        
        .activity-icon.rejected {
            background-color: rgba(220, 53, 69, 0.2);
            color: #dc3545;
        }
        
        .activity-content h6 {
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
        }
        
        .activity-content small {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/logo.png" alt="CHICO TRANS">
            </a>
            
            <div class="d-flex align-items-center">
                <span class="me-3">
                    <i class="fas fa-user-shield text-success me-1"></i>
                    Admin: {{ Auth::user()->name }}
                </span>
                
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-logout btn-sm">
                        <i class="fas fa-sign-out-alt me-1"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-2">
                        <i class="fas fa-tachometer-alt me-2"></i>Tableau de bord - Administration
                    </h1>
                    <p class="mb-0 opacity-75">Bienvenue dans l'espace d'administration de CHICO TRANS</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="text-white">
                        <small>{{ now()->format('d/m/Y à H:i') }}</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Statistiques principales -->
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="stat-card text-center">
                    <i class="fas fa-users fa-2x mb-3 text-primary"></i>
                    <div class="stat-number">{{ $totalUsers }}</div>
                    <div class="stat-label">Utilisateurs totaux</div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="stat-card text-center">
                    <i class="fas fa-user-tie fa-2x mb-3 text-info"></i>
                    <div class="stat-number">{{ $totalClients }}</div>
                    <div class="stat-label">Clients</div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="stat-card text-center">
                    <i class="fas fa-file-invoice fa-2x mb-3 text-warning"></i>
                    <div class="stat-number">{{ $totalDevis }}</div>
                    <div class="stat-label">Devis totaux</div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="stat-card text-center">
                    <i class="fas fa-clock fa-2x mb-3 text-danger"></i>
                    <div class="stat-number">{{ $pendingDevis }}</div>
                    <div class="stat-label">Devis en attente</div>
                </div>
            </div>
        </div>

        <!-- Résumé rapide des statuts -->
        <div class="quick-stats">
            <h6 class="text-center mb-3">Répartition des devis</h6>
            <div class="row">
                <div class="col-4">
                    <div class="quick-stat-item">
                        <div class="quick-stat-number text-warning">{{ $pendingDevis }}</div>
                        <div class="quick-stat-label">En attente</div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="quick-stat-item">
                        <div class="quick-stat-number text-success">{{ $approvedDevis }}</div>
                        <div class="quick-stat-label">Approuvés</div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="quick-stat-item">
                        <div class="quick-stat-number text-danger">{{ $rejectedDevis }}</div>
                        <div class="quick-stat-label">Rejetés</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Actions rapides -->
            <div class="col-lg-6">
                <div class="admin-card">
                    <h5><i class="fas fa-bolt me-2"></i>Actions rapides</h5>
                    
                    <a href="{{ route('admin.devis.new') }}" class="btn-admin">
                        <i class="fas fa-file-invoice me-1"></i> Nouveaux devis 
                        @if($pendingDevis > 0)
                            <span class="badge bg-light text-dark ms-1">{{ $pendingDevis }}</span>
                        @endif
                    </a>
                    
                    <a href="{{ route('admin.users') }}" class="btn-admin">
                        <i class="fas fa-users me-1"></i> Gérer les utilisateurs
                    </a>
                    
                    <a href="{{ route('admin.devis') }}" class="btn-admin">
                        <i class="fas fa-list me-1"></i> Tous les devis
                    </a>
                    
                    <a href="/" class="btn-admin" target="_blank">
                        <i class="fas fa-home me-1"></i> Voir le site
                    </a>
                    
                    <a href="{{ route('devis.form') }}" class="btn-admin">
                        <i class="fas fa-plus me-1"></i> Créer un devis
                    </a>
                </div>
                
                <!-- Activité récente -->
                <div class="admin-card">
                    <h5><i class="fas fa-history me-2"></i>Activité récente</h5>
                    
                    @if($recentDevis->count() > 0)
                        @foreach($recentDevis->take(3) as $devis)
                            <div class="activity-item">
                                <div class="activity-icon {{ $devis->status === 'pending' ? 'new' : ($devis->status === 'approved' ? 'approved' : 'rejected') }}">
                                    <i class="fas {{ $devis->status === 'pending' ? 'fa-clock' : ($devis->status === 'approved' ? 'fa-check' : 'fa-times') }}"></i>
                                </div>
                                <div class="activity-content">
                                    <h6 class="mb-1">Devis {{ $devis->reference }}</h6>
                                    <small>{{ $devis->contact_name }} - {{ $devis->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Aucune activité récente.</p>
                    @endif
                </div>
            </div>
            
            <!-- Derniers devis -->
            <div class="col-lg-6">
                <div class="admin-card">
                    <h5><i class="fas fa-file-alt me-2"></i>Derniers devis soumis</h5>
                    
                    @if($recentDevis->count() > 0)
                        @foreach($recentDevis as $devis)
                            <div class="devis-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $devis->reference }}</strong><br>
                                        <small class="text-muted">
                                            <i class="fas fa-user me-1"></i>{{ $devis->contact_name }} - {{ $devis->company_name }}<br>
                                            <i class="fas fa-calendar me-1"></i>{{ $devis->created_at->format('d/m/Y à H:i') }}
                                        </small>
                                    </div>
                                    <div class="text-end">
                                        @if($devis->status === 'pending')
                                            <span class="badge badge-pending">En attente</span>
                                        @elseif($devis->status === 'approved')
                                            <span class="badge badge-approved">Approuvé</span>
                                        @else
                                            <span class="badge badge-rejected">Rejeté</span>
                                        @endif
                                        <br>
                                        <small class="text-muted">{{ number_format($devis->total_ttc, 2) }} DH</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="text-center mt-3">
                            <a href="{{ route('admin.devis') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye me-1"></i> Voir tous les devis
                            </a>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Aucun devis pour le moment.</p>
                            <a href="{{ route('devis.form') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus me-1"></i> Créer le premier devis
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Statistiques détaillées -->
        <div class="row">
            <div class="col-lg-4">
                <div class="stat-card text-center">
                    <i class="fas fa-hourglass-half fa-2x mb-3 text-warning"></i>
                    <div class="stat-number text-warning">{{ $pendingDevis }}</div>
                    <div class="stat-label">Devis en attente de validation</div>
                    @if($pendingDevis > 0)
                        <small class="text-muted d-block mt-2">Nécessitent votre attention</small>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="stat-card text-center">
                    <i class="fas fa-check-circle fa-2x mb-3 text-success"></i>
                    <div class="stat-number text-success">{{ $approvedDevis }}</div>
                    <div class="stat-label">Devis approuvés</div>
                    @if($totalDevis > 0)
                        <small class="text-muted d-block mt-2">{{ round(($approvedDevis / $totalDevis) * 100) }}% du total</small>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="stat-card text-center">
                    <i class="fas fa-times-circle fa-2x mb-3 text-danger"></i>
                    <div class="stat-number text-danger">{{ $rejectedDevis }}</div>
                    <div class="stat-label">Devis rejetés</div>
                    @if($totalDevis > 0)
                        <small class="text-muted d-block mt-2">{{ round(($rejectedDevis / $totalDevis) * 100) }}% du total</small>
                    @endif
                </div>
            </div>
        </div>

        <!-- Actions d'urgence -->
        @if($pendingDevis > 5)
            <div class="alert alert-warning" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Attention !</strong> Vous avez {{ $pendingDevis }} devis en attente de traitement.
                <a href="{{ route('admin.devis.new') }}" class="alert-link">Traiter maintenant</a>
            </div>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto-refresh des notifications toutes les 30 secondes
        setInterval(function() {
            // Vous pouvez ajouter ici une requête AJAX pour rafraîchir les stats
            console.log('Vérification des nouvelles notifications...');
        }, 30000);
        
        // Animation au chargement
        document.addEventListener('DOMContentLoaded', function() {
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.5s ease';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 100);
            });
        });
    </script>
</body>
</html>