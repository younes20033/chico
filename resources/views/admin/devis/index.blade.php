<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les devis - Admin CHICO TRANS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4d4d4d;
            --secondary-color: #d13333;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        
        .admin-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }
        
        .badge-status {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 500;
            border-radius: 20px;
        }
        
        .badge-pending { background-color: #ffc107; color: #212529; }
        .badge-approved { background-color: #28a745; color: white; }
        .badge-rejected { background-color: #dc3545; color: white; }
        
        .btn-action {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            margin-right: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Tous les devis</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour au dashboard
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <div class="admin-card">
            @if($devis->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Référence</th>
                                <th>Client</th>
                                <th>Entreprise</th>
                                <th>Date</th>
                                <th>Montant TTC</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($devis as $d)
                                <tr>
                                    <td><strong>{{ $d->reference }}</strong></td>
                                    <td>{{ $d->contact_name }}</td>
                                    <td>{{ $d->company_name }}</td>
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
                                        <a href="{{ route('devis.show', $d->id) }}" class="btn btn-info btn-action">
                                            <i class="fas fa-eye"></i> Voir
                                        </a>
                                        @if($d->status === 'pending')
                                            <form action="{{ route('admin.devis.approve', $d->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-action">
                                                    <i class="fas fa-check"></i> Approuver
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.devis.reject', $d->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-action">
                                                    <i class="fas fa-times"></i> Rejeter
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{ $devis->links() }}
            @else
                <div class="text-center py-5">
                    <i class="fas fa-file-invoice fa-3x text-muted mb-3"></i>
                    <h4>Aucun devis trouvé</h4>
                    <p class="text-muted">Il n'y a aucun devis dans le système pour le moment.</p>
                </div>
            @endif
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>