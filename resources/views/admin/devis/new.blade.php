<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveaux devis - Admin CHICO TRANS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4d4d4d;
            --secondary-color: #d13333;
            --grey-color: #6c757d;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        
        .admin-container {
            padding: 2rem 0;
        }
        
        .admin-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .badge-pending {
            background-color: #ffc107;
            color: #212529;
        }
        
        .btn-approve {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            margin-right: 0.5rem;
        }
        
        .btn-reject {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="container">
            <div class="mb-4">
                <h1 class="admin-title">Nouveaux devis en attente</h1>
                <p class="text-muted">Gérez les devis soumis par les clients</p>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('info'))
                <div class="alert alert-info">{{ session('info') }}</div>
            @endif
            
            <div class="admin-card">
                @if($devis->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Client</th>
                                    <th>Entreprise</th>
                                    <th>Montant TTC</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($devis as $d)
                                    <tr>
                                        <td>{{ $d->reference }}</td>
                                        <td>{{ $d->contact_name }}</td>
                                        <td>{{ $d->company_name }}</td>
                                        <td>{{ number_format($d->total_ttc, 2) }} DH</td>
                                        <td>{{ $d->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <span class="badge badge-pending">En attente</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.devis.show', $d->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Voir
                                            </a>
                                            <form action="{{ route('admin.devis.approve', $d->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn-approve btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.devis.reject', $d->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn-reject btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $devis->links() }}
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h4>Aucun nouveau devis</h4>
                        <p class="text-muted">Tous les devis ont été traités.</p>
                        <a href="{{ route('admin.devis') }}" class="btn btn-primary">
                            <i class="fas fa-list"></i> Voir tous les devis
                        </a>
                    </div>
                @endif
            </div>

            <!-- Bouton retour -->
            <div class="text-center mt-4">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour au dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>