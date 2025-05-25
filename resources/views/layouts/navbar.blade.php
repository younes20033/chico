<nav class="navbar navbar-expand-lg {{ $navbarClass ?? 'fixed-top' }}">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/logo.png" alt="CHICO TRANS Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">ACCUEIL</a>
                </li>
                <li class="nav-item {{ request()->is('qui-sommes-nous') ? 'active' : '' }}">
                    <a class="nav-link" href="/qui-sommes-nous">QUI SOMMES-NOUS</a>
                </li>
                <li class="nav-item dropdown {{ request()->is('services*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="/services" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        NOS SERVICES
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/services#transport-national">Transport national</a></li>
                        <li><a class="dropdown-item" href="/services#transport-international">Transport international</a></li>
                        <li><a class="dropdown-item" href="/services#logistique-complete">Logistique complète</a></li>
                        <li><a class="dropdown-item" href="/services#stockage-temporaire">Stockage temporaire</a></li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('partenaire*') ? 'active' : '' }}">
                    <a class="nav-link" href="/partenaire">DEVENIR PARTENAIRE</a>
                </li>
                <li class="nav-item {{ request()->is('contactez-nous*') ? 'active' : '' }}">
                    <a class="nav-link" href="/contactez-nous">CONTACTEZ-NOUS</a>
                </li>
            </ul>
            
            <!-- Navbar Buttons Area -->
            <div class="navbar-action-btns">
                @guest
                    <!-- Buttons for not logged in users -->
                    <button class="btn-auth" data-bs-toggle="modal" data-bs-target="#loginModal">CONNEXION</button>
                    <button class="btn-auth" data-bs-toggle="modal" data-bs-target="#registerModal">INSCRIPTION</button>
                @else
                    <!-- Dropdown for logged in users -->
                    <div class="dropdown">
                        <a class="user-menu dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-avatar">
                                @if(Auth::user()->profile_image)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }}">
                                @else
                                    <img src="{{ asset('img/default-avatar.png') }}" alt="{{ Auth::user()->name }}">
                                @endif
                            </div>
                            <div class="user-info">
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <span class="user-role">
                                    @if(Auth::user()->role === 'admin')
                                        Administrateur
                                    @else
                                        Client
                                    @endif
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            @if(Auth::user()->role === 'admin')
                                <!-- Menu pour Admin -->
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                               
                                <li><a class="dropdown-item" href="{{ route('admin.devis') }}">Gestion devis</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.notifications') }}">Voir toutes les notifications</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
                            @else
                                <!-- Menu pour Client -->
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
                                <li><a class="dropdown-item" href="{{ route('devis.history') }}">Historique des devis</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
                <a href="/devis" class="btn-devis">DEMANDER UN DEVIS</a>
            </div>
        </div>
    </div>
</nav>