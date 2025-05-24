@extends('layouts.app')

@section('title', 'Gestion des utilisateurs - Admin CHICO TRANS')

@section('description', 'Interface d\'administration pour gérer les utilisateurs CHICO TRANS.')

@push('styles')
<style>
    .admin-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 1.5rem;
    }
    
    .badge-role {
        padding: 0.35em 0.65em;
        font-size: 0.75em;
        font-weight: 500;
        border-radius: 20px;
    }
    
    .badge-admin { background-color: #dc3545; color: white; }
    .badge-client { background-color: #17a2b8; color: white; }
    
    .btn-action {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        margin-right: 0.25rem;
    }
</style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Gestion des utilisateurs</h1>
            <div>
                <a href="{{ route('admin.users.create') }}" class="btn btn-success">
                    <i class="fas fa-user-plus"></i> Ajouter un utilisateur
                </a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour au dashboard
                </a>
            </div>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <div class="admin-card">
            @if($users->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Entreprise</th>
                                <th>Rôle</th>
                                <th>Date d'inscription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->company_name ?: '-' }}</td>
                                    <td>
                                        @if($user->role === 'admin')
                                            <span class="badge badge-role badge-admin">Admin</span>
                                        @else
                                            <span class="badge badge-role badge-client">Client</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-action">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        @if($user->id !== Auth::id())
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline" 
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-action">
                                                    <i class="fas fa-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{ $users->links() }}
            @else
                <div class="text-center py-5">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <h4>Aucun utilisateur trouvé</h4>
                    <p class="text-muted">Il n'y a aucun utilisateur dans le système pour le moment.</p>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success">
                        <i class="fas fa-user-plus"></i> Ajouter le premier utilisateur
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection