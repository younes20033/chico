<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CHICO TRANS</title>
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
        }
        
        .login-card {
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
        
        .alert {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo">
            <a href="/">
                <img src="/logo.png" alt="CHICO TRANS">
            </a>
        </div>
        
        <h2 class="text-center mb-4" style="color: var(--primary-color);">Connexion</h2>
        
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        @if(session('status'))
            <div class="alert alert-info">{{ session('status') }}</div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>
            
            <button type="submit" class="btn btn-primary-custom">Se connecter</button>
        </form>
        
        <div class="text-center mt-3">
            <p class="mb-1">
                <a href="{{ route('password.request') }}" style="color: var(--secondary-color);">Mot de passe oublié ?</a>
            </p>
            <p class="mb-0">Pas de compte ? <a href="{{ route('register') }}" style="color: var(--secondary-color);">S'inscrire</a></p>
            <p class="mt-2"><a href="/" style="color: var(--primary-color);">← Retour à l'accueil</a></p>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>