@extends('layouts.app')

@section('title', 'Ajouter un utilisateur - Admin CHICO TRANS')

@section('description', 'Interface d\'administration pour ajouter un nouvel utilisateur CHICO TRANS.')

@push('styles')
<style>
    .admin-card {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .btn-primary-custom {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }
    
    .btn-primary-custom:hover {
        background-color: #c0392b;
        border-color: #c0392b;
    }
</style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Ajouter un utilisateur</h1>
            <a href="{{ route('admin.users') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="admin-card">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nom complet *</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Mot de passe *</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="role" class="form-label">Rôle *</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="">Sélectionnez un rôle</option>
                            <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="company_name" class="form-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}">
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-user-plus"></i> Créer l'utilisateur
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection