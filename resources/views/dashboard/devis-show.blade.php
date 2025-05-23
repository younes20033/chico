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
    </style>
</head>
<body>
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
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.devis.new') }}" class="btn-action btn-back">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    @else
                        <a href="{{ route('devis.history') }}" class="btn-action btn-back">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    @endif
                    
                    @if($devis->pdf_path)
                        <a href="{{ asset('storage/' . $devis->pdf_path) }}" class="btn-action btn-download" target="_blank">
                            <i class="fas fa-download"></i> Télécharger PDF
                        </a>
                    @endif
                </div>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    {{ session('error') }}
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
                    @if($devis->transports && $devis->transports->count() > 0)
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
                    @else
                        <p class="text-muted">Aucun détail de transport disponible.</p>
                    @endif
                    
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
                    
                    @if(Auth::user()->role === 'admin' && $devis->status === 'pending')
                        <div class="admin-actions">
                            <h4 class="mb-3">Actions administrateur</h4>
                            <form action="{{ route('admin.devis.approve', $devis->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn-status btn-approve" onclick="return confirm('Êtes-vous sûr de vouloir approuver ce devis ?')">
                                    <i class="fas fa-check me-1"></i> Approuver
                                </button>
                            </form>
                            
                            <form action="{{ route('admin.devis.reject', $devis->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn-status btn-reject" onclick="return confirm('Êtes-vous sûr de vouloir rejeter ce devis ?')">
                                    <i class="fas fa-times me-1"></i> Rejeter
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>