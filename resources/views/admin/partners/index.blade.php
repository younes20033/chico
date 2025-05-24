@extends('layouts.app')

@section('title', 'Candidatures Partenaires - Admin CHICO TRANS')

@section('description', 'Interface d\'administration pour gérer les candidatures de partenaires CHICO TRANS.')

@push('styles')
<style>
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
    
    .partner-type {
        background-color: #17a2b8;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.7rem;
    }
</style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Candidatures de Partenariat</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour au dashboard
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <div class="admin-card">
            @if($partners->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Entreprise</th>
                                <th>Contact</th>
                                <th>Type de partenariat</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partners as $partner)
                                <tr>
                                    <td>
                                        <strong>{{ $partner->company_name }}</strong><br>
                                        <small class="text-muted">{{ $partner->activity }}</small>
                                    </td>
                                    <td>
                                        {{ $partner->contact_name }}<br>
                                        <small class="text-muted">{{ $partner->position }}</small><br>
                                        <small class="text-muted">{{ $partner->email }}</small>
                                    </td>
                                    <td>
                                        <span class="partner-type">{{ $partner->getPartnershipTypeLabel() }}</span>
                                    </td>
                                    <td>{{ $partner->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @if($partner->status === 'pending')
                                            <span class="badge badge-status badge-pending">En attente</span>
                                        @elseif($partner->status === 'approved')
                                            <span class="badge badge-status badge-approved">Approuvé</span>
                                        @elseif($partner->status === 'rejected')
                                            <span class="badge badge-status badge-rejected">Rejeté</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.partners.show', $partner->id) }}" class="btn btn-info btn-action">
                                            <i class="fas fa-eye"></i> Voir
                                        </a>
                                        @if($partner->status === 'pending')
                                            <form action="{{ route('admin.partners.update-status', $partner->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn btn-success btn-action">
                                                    <i class="fas fa-check"></i> Approuver
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.partners.update-status', $partner->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="rejected">
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
                
                {{ $partners->links() }}
            @else
                <div class="text-center py-5">
                    <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                    <h4>Aucune candidature trouvée</h4>
                    <p class="text-muted">Il n'y a aucune candidature de partenariat pour le moment.</p>
                </div>
            @endif
        </div>
    </div>
@endsection