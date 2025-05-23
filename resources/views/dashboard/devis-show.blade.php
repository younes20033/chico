<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du devis - CHICO TRANS</title>
    
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
        
        /* Detail Container */
        .detail-container {
            padding: 2rem 0;
        }
        
        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .detail-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
        }
        
        .detail-actions {
            display: flex;
            gap: 1rem;
        }
        
        .btn-action {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .btn-action i {
            margin-right: 0.5rem;
        }
        
        .btn-back {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }
        
        .btn-download {
            background-color: var(--secondary-color);
            color: white;
            border: none;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Status Badge */
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
        
        /* Detail Card */
        .detail-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            overflow: hidden;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Client Info */
        .client-info {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .info-group {
            margin-bottom: 0.5rem;
        }
        
        .info-label {
            font-size: 0.8rem;
            color: var(--grey-color);
            margin-bottom: 0.25rem;
        }
        
        .info-value {
            font-weight: 500;
            color: var(--primary-color);
        }
        
        /* Transports Table */
        .transports-table {
            width: 100%;
        }
        
        .transports-table th {
            font-weight: 600;
            color: var(--primary-color);
            padding: 0.75rem;
            font-size: 0.9rem;
            border-bottom: 1px solid #e1e1e1;
        }
        
        .transports-table td {
            padding: 0.75rem;
            vertical-align: middle;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .transports-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        /* Totals Section */
        .totals-section {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e1e1e1;
        }
        
        .totals-table {
            width: 100%;
            max-width: 400px;
            margin-left: auto;
        }
        
        .totals-table td {
            padding: 0.5rem 0;
        }
        
        .totals-table td:last-child {
            text-align: right;
            font-weight: 600;
        }
        
        .total-row {
            color: var(--secondary-color);
            font-size: 1.1rem;
        }
        
        /* Admin Actions */
        .admin-actions {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e1e1e1;
        }
        
        .btn-status {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.9rem;
            margin-right: 0.5rem;
            transition: all 0.3s;
            border: none;
        }
        
        .btn-approve {
            background-color: #28a745;
            color: white;
        }
        
        .btn-reject {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-status:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            .detail-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .detail-actions {
                margin-top: 1rem;
            }
            
            .transports-table {
                display: block;
                overflow-x: auto;
            }
            
            .detail-title {
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
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
        @else
            <!-- Menu pour Client -->
            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a></li>
            <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
            <li><a class="dropdown-item" href="{{ route('devis.history') }}">Historique des devis</a></li>
            <li><a class="dropdown-item" href="{{ route('real.time') }}">Suivi en temps réel</a></li>
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

    <!-- Details Content -->
    <div class="detail-container">
        <div class="container">
            <div class="detail-header">
                <h1 class="detail-title">
                    Devis #{{ $devis->reference }}
                    @if($devis->status === 'pending')
                        <span class="badge badge-status badge-pending">En attente</span>
                    @elseif($devis->status === 'approved')
                        <span class="badge badge-status badge-approved">Approuvé</span>
                    @elseif($devis->status === 'rejected')
                        <span class="badge badge-status badge-rejected">Rejeté</span>
                    @endif
                </h1>
                
                <div class="detail-actions">
                    <a href="{{ route('devis.history') }}" class="btn-action btn-back">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                    <a href="{{ route('devis.download', $devis->id) }}" class="btn-action btn-download">
                        <i class="fas fa-download"></i> Télécharger PDF
                    </a>
                </div>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <!-- Client Information -->
            <div class="detail-card">
                <div class="card-header">
                    Informations client
                </div>
                <div class="card-body">
                    <div class="client-info">
                        <div>
                            <div class="info-group">
                                <div class="info-label">Entreprise</div>
                                <div class="info-value">{{ $devis->company_name }}</div>
                            </div>
                            
                            <div class="info-group">
                                <div class="info-label">Contact</div>
                                <div class="info-value">{{ $devis->contact_name }}</div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="info-group">
                                <div class="info-label">Email</div>
                                <div class="info-value">{{ $devis->email }}</div>
                            </div>
                            
                            <div class="info-group">
                                <div class="info-label">Téléphone</div>
                                <div class="info-value">{{ $devis->telephone }}</div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="info-group">
                                <div class="info-label">Adresse</div>
                                <div class="info-value">{{ $devis->address }}</div>
                            </div>
                            
                            <div class="info-group">
                                <div class="info-label">Ville</div>
                                <div class="info-value">{{ $devis->city }}</div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="info-group">
                                <div class="info-label">Code postal</div>
                                <div class="info-value">{{ $devis->postal_code ?: 'Non spécifié' }}</div>
                            </div>
                            
                            <div class="info-group">
                                <div class="info-label">ICE</div>
                                <div class="info-value">{{ $devis->ice ?: 'Non spécifié' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Transport Details -->
            <div class="detail-card">
                <div class="card-header">
                    Détails des transports
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="transports-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Destination</th>
                                    <th>Type de véhicule</th>
                                    <th>Référence</th>
                                    <th>Description</th>
                                    <th>Prix HT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($devis->transports as $transport)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($transport->date)->format('d/m/Y') }}</td>
                                        <td>{{ $transport->destination }}</td>
                                        <td>{{ $transport->vehicle_type }}</td>
                                        <td>{{ $transport->reference ?: '-' }}</td>
                                        <td>{{ $transport->description ?: '-' }}</td>
                                        <td>{{ number_format($transport->price, 2, ',', ' ') }} DH</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if($devis->special_requirements)
                        <div class="mt-4">
                            <h4 class="mb-2">Exigences particulières</h4>
                            <p>{{ $devis->special_requirements }}</p>
                        </div>
                    @endif
                    
                    <div class="totals-section">
                        <table class="totals-table">
                            <tr>
                                <td>Total HT :</td>
                                <td>{{ number_format($devis->total_ht, 2, ',', ' ') }} DH</td>
                            </tr>
                            <tr>
                                <td>TVA ({{ $devis->tva_rate }}%) :</td>
                                <td>{{ number_format($devis->total_tva, 2, ',', ' ') }} DH</td>
                            </tr>
                            <tr class="total-row">
                                <td>Total TTC :</td>
                                <td>{{ number_format($devis->total_ttc, 2, ',', ' ') }} DH</td>
                            </tr>
                        </table>
                    </div>
                    
                    @if(Auth::user()->isAdmin() && $devis->status === 'pending')
                        <div class="admin-actions">
                            <h4 class="mb-3">Actions administrateur</h4>
                            <form action="{{ route('devis.update-status', $devis->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn-status btn-approve">
                                    <i class="fas fa-check me-1"></i> Approuver
                                </button>
                            </form>
                            
                            <form action="{{ route('devis.update-status', $devis->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn-status btn-reject">
                                    <i class="fas fa-times me-1"></i> Rejeter
                                </button>
                            </form>
                        </div>
                    @endif
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