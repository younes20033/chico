@extends('layouts.app')

@section('title', 'Connexion - CHICO TRANS')

@section('description', 'Connectez-vous à votre compte CHICO TRANS pour gérer vos transports et devis.')

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
        max-width: 420px;
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
        
        <h1 class="auth-title">Connexion à votre compte</h1>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="validation-error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <div class="validation-error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>
            
            <button type="submit" class="btn-submit w-100">Se connecter</button>
        </form>
        
        <div class="auth-footer">
            <p>Vous n'avez pas de compte? <a href="{{ route('register') }}">S'inscrire</a></p>
            <p><a href="/">Retour à l'accueil</a></p>
        </div>
    </div>
</div>
@endsection