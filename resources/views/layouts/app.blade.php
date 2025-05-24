<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CHICO TRANS - Transport de remorque')</title>
    
    <!-- Meta Description -->
    <meta name="description" content="@yield('description', 'CHICO TRANS - Solutions de transport fiables et efficaces depuis plus de 20 ans. Transport national, international, logistique complète.')">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS - Animation On Scroll -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    
    <!-- Styles globaux -->
    <style>
        :root {
            --primary-color: #4d4d4d;
            --secondary-color: #d13333;
            --dark-color: #333333;
            --light-color: #f8f9fa;
            --grey-color: #6c757d;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        /* Navbar - Compact and Professional */
        .navbar {
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            background-color: white;
        }
        
        .navbar-brand img {
            height: 45px;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            text-transform: uppercase;
            color: var(--dark-color);
            font-size: 0.85rem;
            padding: 0.5rem 0.75rem;
        }
        
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--secondary-color);
        }
        
        .navbar-nav .nav-item {
            position: relative;
        }
        
        .navbar-nav .nav-item::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0.75rem;
            background-color: var(--secondary-color);
            transition: width 0.3s;
        }
        
        .navbar-nav .nav-item:hover::after,
        .navbar-nav .nav-item.active::after {
            width: calc(100% - 1.5rem);
        }
        
        .dropdown-menu {
            border-radius: 0.25rem;
            border: none;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            min-width: 12rem;
        }
        
        .dropdown-item {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: var(--secondary-color);
        }
        
        /* Optimized Navbar Buttons */
        .navbar-action-btns {
            display: flex;
            align-items: center;
        }
        
        .btn-auth {
            border: 1px solid var(--primary-color);
            background-color: transparent;
            color: var(--primary-color);
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-weight: 500;
            margin-right: 0.5rem;
            transition: all 0.2s;
        }
        
        .btn-auth:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-devis {
            background-color: var(--secondary-color);
            color: white;
            text-decoration: none;
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-weight: 500;
            border: none;
            transition: all 0.2s;
        }
        
        .btn-devis:hover {
            background-color: #c0392b;
            color: white;
        }
        
        @media (max-width: 991.98px) {
            .navbar-action-btns {
                margin-top: 0.5rem;
                flex-wrap: wrap;
            }
            
            .btn-auth, .btn-devis {
                margin-bottom: 0.5rem;
                font-size: 0.75rem;
                padding: 0.35rem 0.7rem;
            }
        }
        
        /* User Menu Styles */
        .user-menu {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--primary-color);
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .user-menu:hover {
            background-color: rgba(0, 0, 0, 0.05);
            color: var(--primary-color);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 0.5rem;
            border: 2px solid var(--secondary-color);
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--primary-color);
        }

        .user-role {
            font-size: 0.7rem;
            color: var(--grey-color);
        }
        
        /* Section styles */
        .section-padding {
            padding: 4rem 0;
        }
        
        .section-light {
            background-color: white;
        }
        
        .section-dark {
            background-color: var(--light-color);
        }
        
        .section-title {
            position: relative;
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 2.5rem;
            text-align: center;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -0.75rem;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
        }
        
        /* Footer */
        .footer {
            background-color: var(--dark-color);
            color: #ddd;
            padding: 4rem 0 2rem;
            font-size: 0.9rem;
        }
        
        .footer-logo {
            height: 60px;
            margin-bottom: 1.5rem;
        }
        
        .footer-text {
            color: #b0b0b0;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .footer-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--secondary-color);
        }
        
        .footer-links {
            list-style: none;
            padding-left: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: #b0b0b0;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--secondary-color);
            padding-left: 5px;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #b0b0b0;
        }
        
        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background-color: var(--secondary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            z-index: 999;
            font-size: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .back-to-top:hover {
            background-color: #c0392b;
        }
        
        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        /* Modal styles */
        .modal-content {
            border-radius: 8px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .modal-header {
            border-bottom: none;
            padding: 1.5rem 1.5rem 0.5rem;
        }
        
        .modal-body {
            padding: 1rem 1.5rem;
        }
        
        .modal-footer {
            border-top: none;
            padding: 0.5rem 1.5rem 1.5rem;
            justify-content: center;
        }
        
        .form-label {
            font-size: 0.9rem;
            color: var(--grey-color);
            font-weight: 500;
        }
        
        .btn-submit {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        
        .btn-submit:hover {
            background-color: #c0392b;
        }
        
        .form-control {
            padding: 0.75rem;
            border: 1px solid #e1e1e1;
            border-radius: 4px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(209, 51, 51, 0.15);
        }
    </style>
    
    <!-- Styles supplémentaires pour chaque page -->
    @stack('styles')
</head>
<body>
    @php
        use Illuminate\Support\Facades\Auth;
    @endphp

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Back to top button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- Modals -->
    @include('layouts.modals')

    <!-- Scripts -->
    @include('layouts.scripts')
    
    <!-- Scripts supplémentaires pour chaque page -->
    @stack('scripts')
</body>
</html>