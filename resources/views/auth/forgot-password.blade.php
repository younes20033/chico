@extends('layouts.app')

@section('title', 'Mot de passe oublié - CHICO TRANS')

@section('description', 'Réinitialisez votre mot de passe CHICO TRANS.')

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
    
    .forgot-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 2rem;
        width: 100%;
        max-width: 400px;
    }
    
    .logo {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .logo img {
        height: 60px;
    }
</style>
@endpush

@section('content')
<div class="auth-container">
    <div class="forgot-card">
        <div class="logo">
            <a href="/">
                <img src="/logo.png" alt="CHICO TRANS">
            </a>
        </div>
        
        <h2 class="text-center mb-4" style="color: var(--primary-color);">Mot de passe oublié</h2>
        
        <p class="text-muted text-center mb-4">
            Entrez votre adresse email et nous vous enverrons un lien pour réinitialiser votre mot de passe.
        </p>
        
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            
            <button type="submit" class="btn-submit w-100">
                Envoyer le lien de réinitialisation
            </button>
        </form>
        
        <div class="text-center mt-3">
            <p class="mb-0">
                <a href="{{ route('login') }}" style="color: var(--secondary-color);">← Retour à la connexion</a>
            </p>
        </div>
    </div>
</div>
@endsection