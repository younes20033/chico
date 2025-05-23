<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - CHICO TRANS</title>
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
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
            text-align: center;
            border-left: 4px solid var(--secondary-color);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-color);
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }
        
        .dashboard-card h5 {
            color: var(--primary-color);
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .btn-action {
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
        }
        
        .btn-action:hover {
            background-color: #c0392b;
            color: white;
        }
        
        .devis-item {
            padding: 0.75rem;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin-bottom: 0.5rem;
            border-left: 3px solid var(--secondary-color);
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
            
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('profile') }}">Mon profil</a>
                <a class="nav-link" href="{{ route('devis.history') }}">Mes devis</a>
                <a class="nav-link" href="{{ route('real.time') }}">Suivi temps réel</a>
            </div>
            
            <div class="d-flex align-items-center ms-3">
                <span class="me-3">
                    <i class="fas fa-user text-primary me-1"></i>
                    {{ Auth::user()->name }}
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
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4" style="color: var(--primary-color);">
                    <i class="fas fa-tachometer-alt me-2"></i>Tableau de bord
                </h1>
                
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
        </div>

        <!-- Statistiques personnelles -->
        <div class="row">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-number">{{ $totalDevis }}</div>
                    <div class="stat-label">Mes devis</div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-number">{{ $pendingDevis }}</div>
                    <div class="stat-label">En attente</div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-number">{{ $approvedDevis }}</div>
                    <div class="stat-label">Approuvés</div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Actions rapides -->
            <div class="col-lg-6">
                <div class="dashboard-card">
                    <h5><i class="fas fa-bolt me-2"></i>Actions rapides</h5>
                    
                    <a href="{{ route('devis.form') }}" class="btn-action">
                        <i class="fas fa-plus me-1"></i> Nouveau devis
                    </a>
                    
                    <a href="{{ route('devis.history') }}" class="btn-action">
                        <i class="fas fa-history me-1"></i> Mes devis
                    </a>
                    
                    <a href="{{ route('profile') }}" class="btn-action">
                        <i class="fas fa-user-edit me-1"></i> Mon profil
                    </a>
                    
                    <a href="{{ route('real.time') }}" class="btn-action">
                        <i class="fas fa-map-marked-alt me-1"></i> Suivi temps réel
                    </a>
                </div>
            </div>
            
            <!-- Derniers devis -->
            <div class="col-lg-6">
                <div class="dashboard-card">
                    <h5><i class="fas fa-file-invoice me-2"></i>Mes derniers devis</h5>
                    
                    @if($recentDevis->count() > 0)
                        @foreach($recentDevis as $devis)
                            <div class="devis-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $devis->reference }}</strong><br>
                                        <small>{{ $devis->created_at->format('d/m/Y') }}</small>
                                    </div>
                                    <div>
                                        @if($devis->status === 'pending')
                                            <span class="badge bg-warning">En attente</span>
                                        @elseif($devis->status === 'approved')
                                            <span class="badge bg-success">Approuvé</span>
                                        @else
                                            <span class="badge bg-danger">Rejeté</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Aucun devis pour le moment.</p>
                        <a href="{{ route('devis.form') }}" class="btn btn-primary">Créer mon premier devis</a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Informations utiles -->
        <div class="row">
            <div class="col-12">
                <div class="dashboard-card">
                    <h5><i class="fas fa-info-circle me-2"></i>Informations utiles</h5>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Nos services</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-truck text-primary me-2"></i>Transport national</li>
                                <li><i class="fas fa-globe text-primary me-2"></i>Transport international</li>
                                <li><i class="fas fa-boxes text-primary me-2"></i>Logistique complète</li>
                                <li><i class="fas fa-warehouse text-primary me-2"></i>Stockage temporaire</li>
                            </ul>
                        </div>
                        
                        <div class="col-md-6">
                            <h6>Contact</h6>
                            <p class="mb-1"><i class="fas fa-phone text-primary me-2"></i>+212 663 094 035</p>
                            <p class="mb-1"><i class="fas fa-envelope text-primary me-2"></i>transport.chicotrans@gmail.com</p>
                            <p class="mb-0"><i class="fas fa-clock text-primary me-2"></i>Lun-Ven: 8h-18h, Sam: 9h-12h</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>