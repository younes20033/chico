<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des devis - CHICO TRANS</title>
    
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
        
        /* History Container */
        .history-container {
            padding: 2rem 0;
        }
        
        .history-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .history-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .devis-table {
            width: 100%;
        }
        
        .devis-table th {
            font-weight: 600;
            color: var(--primary-color);
            padding: 0.75rem;
            font-size: 0.9rem;
        }
        
        .devis-table td {
            padding: 0.75rem;
            vertical-align: middle;
            font-size: 0.9rem;
        }
        
        .devis-table tbody tr {
            border-bottom: 1px solid #f1f1f1;
        }
        
        .devis-table tbody tr:last-child {
            border-bottom: none;
        }
        
        .badge-status {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 500;
            border-radius: 20px;
        }
        
        .badge-pending {
            background-color: #ffc107;
            color: #212529;
        }
        
        .badge-approved {
            background-color: #28a745;
            color: white;
        }
        
        .badge-rejected {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-action {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            border-radius: 4px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            border: none;
            margin-right: 0.5rem;
            text-decoration: none;
        }
        
        .btn-view {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-download {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-action i {
            margin-right: 0.5rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem 0;
        }
        
        .empty-icon {
            font-size: 3rem;
            color: #e1e1e1;
            margin-bottom: 1rem;
        }
        
        .empty-text {
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
        
        /* Pagination */
        .pagination {
            justify-content: center;
            margin-top: 1.5rem;
        }
        
        .pagination .page-item .page-link {
            color: var(--primary-color);
            border-color: #dee2e6;
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }
        
        .pagination .page-item .page-link:hover {
            background-color: #f1f1f1;
            color: var(--secondary-color);
        }
        
        /* Footer */
       .footer {
            background-color: white;
            padding: 1rem 0;
            text-align: center;
            font-size: 0.85rem;
            color: var(--grey-color);
            border-top: 1px solid #eee;
            margin-top: 7.7rem;
            
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
            .devis-table {
                display: block;
                overflow-x: auto;
            }
            
            .history-title {
                font-size: 1.5rem;
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

    <!-- History Content -->
    <div class="history-container">
        <div class="container">
            <h1 class="history-title">Historique de mes devis</h1>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="history-card">
                @if(count($devis) > 0)
                    <div class="table-responsive">
                        <table class="devis-table">
                            <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Date</th>
                                    <th>Montant TTC</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($devis as $d)
                                    <tr>
                                        <td>{{ $d->reference }}</td>
                                        <td>{{ $d->created_at->format('d/m/Y') }}</td>
                                        <td>{{ number_format($d->total_ttc, 2, ',', ' ') }} DH</td>
                                        <td>
                                            @if($d->status === 'pending')
                                                <span class="badge badge-status badge-pending">En attente</span>
                                            @elseif($d->status === 'approved')
                                                <span class="badge badge-status badge-approved">Approuvé</span>
                                            @elseif($d->status === 'rejected')
                                                <span class="badge badge-status badge-rejected">Rejeté</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('devis.show', $d->id) }}" class="btn-action btn-view">
                                                <i class="fas fa-eye"></i> Voir
                                            </a>
                                            <a href="{{ route('devis.download', $d->id) }}" class="btn-action btn-download">
                                                <i class="fas fa-download"></i> PDF
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $devis->links() }}
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h3>Aucun devis trouvé</h3>
                        <p class="empty-text">Vous n'avez pas encore créé de devis. Commencez par en créer un nouveau.</p>
                        <a href="{{ route('devis.form') }}" class="btn-cta">
                            <i class="fas fa-plus-circle me-2"></i> Créer un devis
                        </a>
                    </div>
                @endif
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