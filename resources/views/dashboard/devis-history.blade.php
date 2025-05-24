@extends('layouts.app')

@section('title', 'Historique des devis - CHICO TRANS')

@section('description', 'Consultez l\'historique de vos devis CHICO TRANS.')

@push('styles')
<style>
    /* History Container */
    .history-container {
        padding: 2rem 0;
        background-color: #f8f9fa;
        min-height: 100vh;
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
@endpush

@section('content')
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
@endsection