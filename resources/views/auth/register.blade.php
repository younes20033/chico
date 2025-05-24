@extends('layouts.app')

@section('title', 'Inscription - CHICO TRANS')

@section('description', 'Créez votre compte CHICO TRANS pour accéder à nos services de transport.')

@push('styles')
<style>
    .auth-container {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
        background-color: var(--light-color);
        min-height: 100vh;
    }
    
    .auth-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        padding: 2rem;
    }
    
    .auth-logo {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .auth-logo img {
        height: 60px;
    }
    
    .auth-title {
        color: var(--primary-color);
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    
    .validation-error {
        color: var(--secondary-color);
        font-size: 0.8rem;
        margin-top: 0.25rem;
    }
    
    .auth-footer {
        text-align: center;
        margin-top: 1rem;
        font-size: 0.9rem;
        color: var(--grey-color);
    }
    
    .auth-footer a {
        color: var(--secondary-color);
        text-decoration: none;
        font-weight: 500;
    }
</style>
@endpush

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-logo">
            <a href="/">
                <img src="/logo.png" alt="CHICO TRANS Logo">
            </a>
        </div>
        
        <h1 class="auth-title">Créer un compte</h1>
        
        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nom complet</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="validation-error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="validation-error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <div class="validation-error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="company_name" class="form-label">Nom de l'entreprise (optionnel)</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}">
                @error('company_name')
                    <div class="validation-error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone (optionnel)</label>
                <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}">
                @error('telephone')
                    <div class="validation-error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">J'accepte les conditions d'utilisation</label>
                @error('terms')
                    <div class="validation-error">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn-submit w-100">S'inscrire</button>
        </form>
        
        <div class="auth-footer">
            <p>Vous avez déjà un compte? <a href="{{ route('login') }}">Se connecter</a></p>
            <p><a href="/">Retour à l'accueil</a></p>
        </div>
    </div>
</div>
@endsection