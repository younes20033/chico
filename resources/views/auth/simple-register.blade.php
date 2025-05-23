<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - CHICO TRANS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4d4d4d;
            --secondary-color: #d13333;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }
        
        .register-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 2rem;
            width: 100%;
            max-width: 500px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo img {
            height: 60px;
        }
        
        .btn-primary-custom {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            width: 100%;
            padding: 0.75rem;
            font-weight: 500;
        }
        
        .btn-primary-custom:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(209, 51, 51, 0.25);
        }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="logo">
            <a href="/">
                <img src="/logo.png" alt="CHICO TRANS">
            </a>
        </div>
        
        <h2 class="text-center mb-4" style="color: var(--primary-color);">Créer un compte</h2>
        
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="company_name" class="form-label">Entreprise (optionnel)</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="telephone" class="form-label">Téléphone (optionnel)</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}">
                </div>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms">J'accepte les conditions d'utilisation</label>
            </div>
            
            <button type="submit" class="btn btn-primary-custom">S'inscrire</button>
        </form>
        
        <div class="text-center mt-3">
            <p class="mb-0">Déjà un compte ? <a href="{{ route('login') }}" style="color: var(--secondary-color);">Se connecter</a></p>
            <p class="mt-2"><a href="/" style="color: var(--primary-color);">← Retour à l'accueil</a></p>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>