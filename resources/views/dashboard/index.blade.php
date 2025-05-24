@extends('layouts.app')

@section('title', 'Tableau de bord - CHICO TRANS')

@section('description', 'Tableau de bord client CHICO TRANS - Gérez vos devis et suivez vos transports.')

@push('styles')
<style>
    /* Professional Dashboard Styles */
    .breadcrumb {
        padding: 0;
        margin-bottom: 1.5rem;
        background-color: transparent;
        font-size: 0.85rem;
    }

    .breadcrumb-item a {
        color: var(--secondary-color);
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: var(--grey-color);
    }

    /* Welcome Card */
    .welcome-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .welcome-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .welcome-subtitle {
        color: var(--grey-color);
        font-size: 1rem;
        margin-bottom: 0;
    }

    .quick-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .quick-action-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s;
        color: var(--primary-color);
        background-color: #f5f5f5;
        border: 1px solid #e1e1e1;
    }

    .quick-action-btn i {
        margin-right: 0.5rem;
    }

    .quick-action-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: var(--primary-color);
    }

    .quick-action-primary {
        background-color: var(--secondary-color);
        color: white;
        border: none;
    }

    .quick-action-primary:hover {
        color: white;
        background-color: #c0392b;
    }

    /* Stat Cards */
    .stats-row {
        margin-bottom: 1.5rem;
    }

    .stat-card-pro {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s;
    }

    .stat-card-pro:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .stat-card-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }

    .stat-icon-primary {
        background-color: rgba(209, 51, 51, 0.1);
        color: var(--secondary-color);
    }

    .stat-icon-warning {
        background-color: rgba(255, 193, 7, 0.1);
        color: #ffc107;
    }

    .stat-icon-success {
        background-color: rgba(40, 167, 69, 0.1);
        color: #28a745;
    }

    .stat-icon-info {
        background-color: rgba(23, 162, 184, 0.1);
        color: #17a2b8;
    }

    .stat-card-info {
        margin-bottom: 1rem;
    }

    .stat-card-number {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
        line-height: 1;
    }

    .stat-card-text {
        font-size: 0.85rem;
        color: var(--grey-color);
    }

    .stat-card-progress {
        height: 4px;
        background-color: #f1f1f1;
        border-radius: 2px;
        margin-bottom: 0.75rem;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        border-radius: 2px;
    }

    .progress-primary {
        background-color: var(--secondary-color);
    }

    .progress-warning {
        background-color: #ffc107;
    }

    .progress-success {
        background-color: #28a745;
    }

    .progress-info {
        background-color: #17a2b8;
    }

    .stat-card-footer {
        font-size: 0.75rem;
        color: var(--grey-color);
        margin-top: auto;
    }

    .stat-trend-up {
        color: #28a745;
        font-weight: 500;
        margin-right: 0.25rem;
    }

    .stat-trend-down {
        color: var(--secondary-color);
        font-weight: 500;
        margin-right: 0.25rem;
    }

    .stat-trend-steady {
        color: #17a2b8;
        font-weight: 500;
        margin-right: 0.25rem;
    }

    /* Dashboard Widgets */
    .dashboard-widget {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        height: 100%;
        margin-bottom: 1.5rem;
    }

    .widget-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #f1f1f1;
    }

    .widget-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0;
        display: flex;
        align-items: center;
    }

    .widget-title i {
        color: var(--secondary-color);
        margin-right: 0.5rem;
        font-size: 1rem;
    }

    .widget-body {
        padding: 1.5rem;
    }

    /* Activity Timeline */
    .activity-timeline {
        position: relative;
        padding-left: 28px;
    }

    .activity-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 8px;
        width: 2px;
        background-color: #f1f1f1;
        z-index: 0;
    }

    .timeline-item {
        position: relative;
        padding-bottom: 1.5rem;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-icon {
        position: absolute;
        left: -28px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.6rem;
        z-index: 1;
    }
    
    .timeline-content {
        padding-left: 1rem;
        position: relative;
    }

    .timeline-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.25rem;
    }

    .timeline-title {
        font-weight: 500;
        color: var(--primary-color);
    }

    .timeline-date {
        font-size: 0.75rem;
        color: var(--grey-color);
    }

    .timeline-text {
        font-size: 0.85rem;
        color: var(--dark-grey-color);
        margin-bottom: 0.5rem;
    }

    .timeline-actions {
        margin-top: 0.25rem;
    }

    .timeline-action-btn {
        font-size: 0.75rem;
        color: var(--secondary-color);
        text-decoration: none;
        font-weight: 500;
    }

    .timeline-action-btn:hover {
        text-decoration: underline;
        color: var(--secondary-color);
    }

    /* Quick Links Widget */
    .quick-links {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .quick-link-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.75rem;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s;
    }

    .quick-link-item:hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }

    .quick-link-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
    }

    .quick-link-text {
        flex-grow: 1;
    }

    .quick-link-text h4 {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.2rem;
    }

    .quick-link-text p {
        font-size: 0.75rem;
        color: var(--grey-color);
        margin-bottom: 0;
    }

    .quick-link-arrow {
        color: var(--grey-color);
        font-size: 0.75rem;
    }
    
    /* Dashboard Container */
    .dashboard-container {
        padding: 2rem 0;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    /* CSS Variables */
    :root {
        --dark-grey-color: #495057;
    }

    /* Additional Utils */
    .bg-primary {
        background-color: var(--primary-color) !important;
    }

    .bg-secondary {
        background-color: var(--secondary-color) !important;
    }

    .text-primary {
        color: var(--primary-color) !important;
    }

    .text-secondary {
        color: var(--secondary-color) !important;
    }

    /* Responsive adjustments */
    @media (max-width: 991.98px) {
        .welcome-card {
            padding: 1.5rem;
        }
        
        .quick-actions {
            justify-content: flex-start;
            margin-top: 1rem;
        }
    }

    @media (max-width: 767.98px) {
        .welcome-title {
            font-size: 1.5rem;
        }
        
        .stat-card-pro {
            margin-bottom: 1rem;
        }
    }
    .btn {
color : #c0392b;
background-color: white;
border-color: #c0392b;

    }
    .btn:hover {
        background-color:#c0392b;
        color:white;
        transform: translateX(5px);
    }
</style>
@endpush

@section('content')
<div class="dashboard-container">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
            </ol>
        </nav>

        <!-- Welcome Header Card -->
        <div class="welcome-card mb-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="welcome-title">Bonjour, {{ Auth::user()->name }}</h1>
                    <p class="welcome-subtitle">Voici un aperçu de votre activité avec CHICO TRANS</p>
                </div>
                <div class="col-lg-6">
                    <div class="quick-actions">
                        <a href="{{ route('profile') }}" class="quick-action-btn">
                            <i class="fas fa-user-edit"></i> Éditer profil
                        </a>
                        <a href="{{ route('devis.form') }}" class="quick-action-btn quick-action-primary">
                            <i class="fas fa-file-invoice"></i> Nouveau devis
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Dashboard Cards -->
        <div class="row stats-row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="stat-card-pro">
                    <div class="stat-card-icon stat-icon-primary">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="stat-card-info">
                        <div class="stat-card-number">{{ $totalDevis }}</div>
                        <div class="stat-card-text">Devis générés</div>
                    </div>
                    <div class="stat-card-progress">
                        <div class="progress-bar progress-primary" style="width: 75%"></div>
                    </div>
                    <div class="stat-card-footer">
                        <span class="stat-trend-up"><i class="fas fa-arrow-up"></i> 15%</span> depuis le mois dernier
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="stat-card-pro">
                    <div class="stat-card-icon stat-icon-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-card-info">
                        <div class="stat-card-number">{{ $pendingDevis }}</div>
                        <div class="stat-card-text">Devis en attente</div>
                    </div>
                    <div class="stat-card-progress">
                        <div class="progress-bar progress-warning" style="width: 60%"></div>
                    </div>
                    <div class="stat-card-footer">
                        <span class="stat-trend-up"><i class="fas fa-arrow-up"></i> 8%</span> depuis le mois dernier
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="stat-card-pro">
                    <div class="stat-card-icon stat-icon-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-card-info">
                        <div class="stat-card-number">{{ $approvedDevis }}</div>
                        <div class="stat-card-text">Devis approuvés</div>
                    </div>
                    <div class="stat-card-progress">
                        <div class="progress-bar progress-success" style="width: 85%"></div>
                    </div>
                    <div class="stat-card-footer">
                        <span class="stat-trend-up"><i class="fas fa-arrow-up"></i> 22%</span> depuis le mois dernier
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="stat-card-pro">
                    <div class="stat-card-icon stat-icon-info">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-card-info">
                        <div class="stat-card-number">4.8</div>
                        <div class="stat-card-text">Note moyenne</div>
                    </div>
                    <div class="stat-card-progress">
                        <div class="progress-bar progress-info" style="width: 95%"></div>
                    </div>
                    <div class="stat-card-footer">
                        <span class="stat-trend-steady"><i class="fas fa-equals"></i> Stable</span> depuis le mois dernier
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="row">
            <!-- Activity Timeline -->
            <div class="activity-timeline">
                @if($recentDevis->count() > 0)
                    @foreach($recentDevis as $devis)
                        <div class="timeline-item">
                            <div class="timeline-icon {{ $devis->status == 'pending' ? 'bg-warning' : ($devis->status == 'approved' ? 'bg-success' : 'bg-danger') }}">
                                <i class="fas {{ $devis->status == 'pending' ? 'fa-clock' : ($devis->status == 'approved' ? 'fa-check' : 'fa-times') }}"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-header">
                                    <span class="timeline-title">Devis #{{ $devis->reference }}</span>
                                    <span class="timeline-date">{{ $devis->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="timeline-text">
                                    {{ $devis->company_name }} - Montant: {{ number_format($devis->total_ttc, 2) }} DH
                                </div>
                                <div class="timeline-actions">
                                    <a href="{{ route('devis.show', $devis->id) }}" class="timeline-action-btn">Voir détails</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="timeline-item">
                        <div class="timeline-icon bg-secondary">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <span class="timeline-title">Aucune activité récente</span>
                                <span class="timeline-date">{{ now()->format('d/m/Y') }}</span>
                            </div>
                            <div class="timeline-text">
                                Vous n'avez pas encore créé de devis. Commencez par en créer un nouveau.
                            </div>
                            <div class="timeline-actions">
                                <a href="{{ route('devis.form') }}" class="timeline-action-btn">Créer un devis</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Quick Links Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h2 class="widget-title">
                            <i class="fas fa-link"></i> Accès rapides
                        </h2>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('devis.form') }}" class="quick-link-item">
                                    <div class="quick-link-icon bg-primary">
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                    <div class="quick-link-text">
                                        <h4>Demander un devis</h4>
                                        <p>Obtenez un devis personnalisé rapidement</p>
                                    </div>
                                    <div class="quick-link-arrow">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('devis.history') }}" class="quick-link-item">
                                    <div class="quick-link-icon bg-info">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <div class="quick-link-text">
                                        <h4>Historique des devis</h4>
                                        <p>Consultez vos devis précédents</p>
                                    </div>
                                    <div class="quick-link-arrow">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Action Cards -->
        <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h2 class="widget-title">
                            <i class="fas fa-truck-loading"></i> Services disponibles
                        </h2>
                    </div>
                    <div class="widget-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-truck text-secondary me-2"></i>
                                    Transport national
                                </div>
                                <a href="/services#transport-national" class="btn">En savoir plus</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-globe-africa text-secondary me-2"></i>
                                    Transport international
                                </div>
                                <a href="/services#transport-international" class="btn">En savoir plus</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-boxes text-secondary me-2"></i>
                                    Logistique complète
                                </div>
                                <a href="/services#logistique-complete" class="btn">En savoir plus</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-warehouse text-secondary me-2"></i>
                                    Stockage temporaire
                                </div>
                                <a href="/services#stockage-temporaire" class="btn">En savoir plus</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="dashboard-widget">
                    <div class="widget-header">
                        <h2 class="widget-title">
                            <i class="fas fa-info-circle"></i> Besoin d'aide ?
                        </h2>
                    </div>
                    <div class="widget-body">
                        <div class="p-2 text-center mb-4">
                            <h5 class="mb-3">Nous sommes là pour vous aider</h5>
                            <p class="mb-4">Vous avez une question ou besoin d'assistance avec votre compte ou vos transports ?</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="/contactez-nous" class="btn">
                                    <i class="fas fa-envelope me-1"></i> Nous contacter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection