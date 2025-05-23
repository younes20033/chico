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
        
        /* Admin Sidebar */
        .admin-sidebar {
            background-color: var(--primary-color);
            min-height: 100vh;
            color: white;
            padding-top: 1rem;
        }
        
        .admin-sidebar-header {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .admin-sidebar-header img {
            height: 40px;
            margin-bottom: 1rem;
        }
        
        .admin-sidebar-header h3 {
            font-size: 1.2rem;
            margin-bottom: 0;
        }
        
        .admin-menu {
            list-style: none;
            padding-left: 0;
        }
        
        .admin-menu-item {
            margin-bottom: 0.5rem;
        }
        
        .admin-menu-link {
            display: block;
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }
        
        .admin-menu-link:hover, .admin-menu-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--secondary-color);
        }
        
        .admin-menu-link i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
        }
        
        /* Admin Content */
        .admin-content {
            padding: 2rem;
        }
        
        .admin-content-header {
            margin-bottom: 2rem;
        }
        
        .admin-content-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        /* Dashboard cards */
        .dashboard-stat-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .dashboard-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background-color: var(--secondary-color);
        }
        
        .dashboard-stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .dashboard-stat-label {
            font-size: 0.9rem;
            color: var(--grey-color);
            margin-bottom: 0;
        }
        
        .dashboard-stat-icon {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 2.5rem;
            color: rgba(209, 51, 51, 0.1);
        }
        
        /* Admin Card */
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
        }
        
        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .admin-sidebar {
                min-height: auto;
                margin-bottom: 1rem;
            }
            
            .admin-content {
                padding: 1rem;
            }
        }
        
        @media (max-width: 767.98px) {
            .admin-content-title {
                font-size: 1.3rem;
            }
            
            .dashboard-stat-value {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 p-0 admin-sidebar">
                <div class="admin-sidebar-header">
                    <img src="/logo.png" alt="CHICO TRANS Logo">
                    <h3>Administration</h3>
                </div>
                
                <ul class="admin-menu">
                    <li class="admin-menu-item">
                        <a href="{{ route('admin.dashboard') }}" class="admin-menu-link active">
                            <i class="fas fa-tachometer-alt"></i> Tableau de bord
                        </a>
                    </li>
                    <li class="admin-menu-item">
                        <a href="{{ route('admin.users') }}" class="admin-menu-link">
                            <i class="fas fa-users"></i> Utilisateurs
                        </a>
                    </li>
                    <li class="admin-menu-item">
                        <a href="{{ route('admin.devis') }}" class="admin-menu-link">
                            <i class="fas fa-file-invoice"></i> Devis
                        </a>
                    </li>
                    <li class="admin-menu-item">
                        <a href="/" class="admin-menu-link">
                            <i class="fas fa-home"></i> Retour au site
                        </a>
                    </li>
                    <li class="admin-menu-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="admin-menu-link w-100 text-start" style="background: none; border: none;">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-10 admin-content">
                <div class="admin-content-header">
                    <h1 class="admin-content-title">Tableau de bord</h1>
                    <p class="text-muted">Bienvenue dans l'administration de CHICO TRANS</p>
                </div>
                
                <!-- Dashboard Stats -->
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="dashboard-stat-card">
                            <div class="dashboard-stat-value">{{ $totalUsers }}</div>
                            <div class="dashboard-stat-label">Utilisateurs totaux</div>
                            <div class="dashboard-stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="dashboard-stat-card">
                            <div class="dashboard-stat-value">{{ $totalClients }}</div>
                            <div class="dashboard-stat-label">Clients</div>
                            <div class="dashboard-stat-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="dashboard-stat-card">
                            <div class="dashboard-stat-value">{{ $totalDevis }}</div>
                            <div class="dashboard-stat-label">Devis totaux</div>
                            <div class="dashboard-stat-icon">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="dashboard-stat-card">
                            <div class="dashboard-stat-value">{{ $pendingDevis }}</div>
                            <div class="dashboard-stat-label">Devis en attente</div>
                            <div class="dashboard-stat-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="admin-card">
                    <h2 class="admin-card-title">Actions rapides</h2>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary w-100">
                                <i class="fas fa-user-plus me-2"></i> Ajouter un utilisateur
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('admin.devis') }}" class="btn btn-success w-100">
                                <i class="fas fa-file-invoice me-2"></i> Gérer les devis
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('admin.users') }}" class="btn btn-info w-100 text-white">
                                <i class="fas fa-users-cog me-2"></i> Gérer les utilisateurs
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- System Information -->
                <div class="admin-card">
                    <h2 class="admin-card-title">Informations système</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Version PHP :</strong> {{ phpversion() }}</p>
                            <p><strong>Version Laravel :</strong> {{ app()->version() }}</p>
                            <p><strong>Date :</strong> {{ date('d/m/Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Environnement :</strong> {{ app()->environment() }}</p>
                            <p><strong>Serveur :</strong> {{ $_SERVER['SERVER_SOFTWARE'] ?? 'Inconnu' }}</p>
                            <p><strong>Base de données :</strong> {{ config('database.connections.mysql.driver') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>