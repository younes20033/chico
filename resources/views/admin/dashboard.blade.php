@extends('layouts.app')

@section('title', 'Tableau de bord - Administration CHICO TRANS')

@section('description', 'Tableau de bord administrateur CHICO TRANS - Gérez les utilisateurs, devis et notifications.')

@push('styles')
<style>
    /* Admin Dashboard Content */
    .admin-container {
        padding: 2rem 0;
    }
    
    .admin-title {
        color: var(--primary-color);
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .admin-subtitle {
        color: var(--grey-color);
        font-size: 1rem;
        margin-bottom: 2rem;
    }
    
    /* Dashboard Stats */
    .stat-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
        transition: all 0.3s;
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background-color: var(--secondary-color);
    }
    
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        font-size: 0.9rem;
        color: var(--grey-color);
        margin-bottom: 0;
    }
    
    .stat-icon {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 2.5rem;
        color: rgba(209, 51, 51, 0.1);
    }
    
    /* Admin Cards */
    .admin-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .admin-card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        border-bottom: 1px solid #f1f1f1;
        padding-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }
    
    .admin-card-title i {
        color: var(--secondary-color);
        margin-right: 0.5rem;
    }
    
    .admin-card-title .badge {
        margin-left: auto;
        font-size: 0.7rem;
    }
    
    /* Notifications List */
    .notification-item {
        padding: 1rem;
        border-left: 4px solid var(--secondary-color);
        background-color: #f8f9fa;
        margin-bottom: 1rem;
        border-radius: 0 4px 4px 0;
        position: relative;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .notification-item:hover {
        background-color: #e9ecef;
        transform: translateX(5px);
    }
    
    .notification-item.unread {
        border-left-color: var(--secondary-color);
        background-color: rgba(209, 51, 51, 0.05);
    }
    
    .notification-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
    }
    
    .notification-message {
        color: var(--grey-color);
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    
    .notification-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.8rem;
        color: var(--grey-color);
    }
    
    /* Quick Actions */
    .quick-action-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
        border: none;
    }
    
    .quick-action-btn i {
        margin-right: 0.5rem;
    }
    
    .quick-action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .btn-primary-custom {
        background-color: var(--secondary-color);
        color: white;
    }
    
    .btn-primary-custom:hover {
        background-color: #c0392b;
        color: white;
    }
    
    .btn-success-custom {
        background-color: #28a745;
        color: white;
    }
    
    .btn-info-custom {
        background-color: var(--primary-color);
        color: white;
    }
    
    .btn-warning-custom {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-warning-custom:hover {
        background-color: #e0a800;
        color: #212529;
    }
    
    /* Recent Activity */
    .activity-item {
        display: flex;
        align-items: flex-start;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f1f1f1;
    }
    
    .activity-item:last-child {
        border-bottom: none;
    }
    
    .activity-icon {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 0.8rem;
    }
    
    .activity-icon.new {
        background-color: rgba(209, 51, 51, 0.1);
        color: var(--secondary-color);
    }
    
    .activity-icon.approved {
        background-color: rgba(40, 167, 69, 0.1);
        color: #28a745;
    }
    
    .activity-icon.rejected {
        background-color: rgba(220, 53, 69, 0.1);
        color: #dc3545;
    }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-title {
        font-weight: 500;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
    }
    
    .activity-description {
        color: var(--grey-color);
        font-size: 0.85rem;
        margin-bottom: 0.25rem;
    }
    
    .activity-time {
        color: var(--grey-color);
        font-size: 0.75rem;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 991.98px) {
        .admin-container {
            padding: 1rem;
        }
        
        .admin-title {
            font-size: 1.5rem;
        }
        
        .stat-value {
            font-size: 1.5rem;
        }
    }
    
    @media (max-width: 767.98px) {
        .notification-item {
            margin-bottom: 0.5rem;
        }
        
        .quick-action-btn {
            width: 100%;
            justify-content: center;
            margin-right: 0;
        }
    }
</style>
@endpush

@section('content')
    <!-- Admin Dashboard Content -->
    <div class="admin-container">
        <div class="container">
            <div class="mb-4">
                <h1 class="admin-title">Tableau de bord - Administration</h1>
                <p class="admin-subtitle">Bienvenue dans l'espace d'administration de CHICO TRANS</p>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            <!-- Dashboard Stats -->
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-value">{{ $totalUsers }}</div>
                        <div class="stat-label">Utilisateurs totaux</div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-value">{{ $totalClients }}</div>
                        <div class="stat-label">Clients</div>
                        <div class="stat-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-value">{{ $totalDevis }}</div>
                        <div class="stat-label">Devis totaux</div>
                        <div class="stat-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-value">{{ $pendingDevis }}</div>
                        <div class="stat-label">Devis en attente</div>
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- Notifications récentes -->
                <div class="col-lg-8">
                    <div class="admin-card">
                        <h3 class="admin-card-title">
                            <i class="fas fa-bell"></i>
                            Notifications récentes
                            @if($notifications->where('read', false)->count() > 0)
                                <span class="badge bg-danger">{{ $notifications->where('read', false)->count() }}</span>
                            @endif
                        </h3>
                        
                        @if($notifications->count() > 0)
                            @foreach($notifications->take(5) as $notification)
                                <div class="notification-item {{ !$notification->read ? 'unread' : '' }}" 
                                     data-notification-id="{{ $notification->id }}"
                                     data-devis-id="{{ $notification->devis_id ?? '' }}"
                                     style="cursor: pointer;"
                                     onclick="handleNotificationClick(this)">
                                    <div class="notification-title">{{ $notification->title }}</div>
                                    <div class="notification-message">{{ $notification->message }}</div>
                                    <div class="notification-meta">
                                        <span>{{ $notification->created_at->diffForHumans() }}</span>
                                        @if(!$notification->read)
                                            <span class="badge bg-danger">Nouveau</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            
                            @if($notifications->count() > 5)
                                <div class="text-center mt-3">
                                    <a href="{{ route('admin.notifications') }}" class="btn btn-outline-primary btn-sm">
                                        Voir toutes les notifications
                                    </a>
                                </div>
                            @endif
                        @else
                            <div class="text-center text-muted py-4">
                                <i class="fas fa-bell-slash fa-2x mb-3"></i>
                                <p>Aucune notification pour le moment</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Actions rapides -->
                <div class="col-lg-4">
                    <div class="admin-card">
                        <h3 class="admin-card-title">
                            <i class="fas fa-bolt"></i>
                            Actions rapides
                        </h3>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.devis.new') }}" class="quick-action-btn btn-primary-custom">
                                <i class="fas fa-file-invoice"></i>
                                Nouveaux devis ({{ $pendingDevis }})
                            </a>
                            
                            
                            <a href="{{ route('admin.devis') }}" class="quick-action-btn btn-info-custom">
                                <i class="fas fa-list"></i>
                                Tous les devis
                            </a>
                            
                            <a href="{{ route('admin.partners') }}" class="quick-action-btn btn-warning-custom">
                                <i class="fas fa-handshake"></i>
                                Candidatures partenaires
                            </a>
                        </div>
                    </div>
                    
                    <!-- Activité récente -->
                    <div class="admin-card">
                        <h3 class="admin-card-title">
                            <i class="fas fa-history"></i>
                            Activité récente
                        </h3>
                        
                        @if($recentDevis->count() > 0)
                            @foreach($recentDevis->take(4) as $devis)
                                <div class="activity-item">
                                    <div class="activity-icon {{ $devis->status == 'pending' ? 'new' : ($devis->status == 'approved' ? 'approved' : 'rejected') }}">
                                        <i class="fas {{ $devis->status == 'pending' ? 'fa-plus' : ($devis->status == 'approved' ? 'fa-check' : 'fa-times') }}"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Devis #{{ $devis->reference }}</div>
                                        <div class="activity-description">{{ $devis->contact_name }} - {{ $devis->company_name }}</div>
                                        <div class="activity-time">{{ $devis->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center text-muted py-3">
                                <i class="fas fa-history fa-2x mb-2"></i>
                                <p class="mb-0">Aucune activité récente</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function handleNotificationClick(element) {
        const notificationId = element.getAttribute('data-notification-id');
        
        if (!notificationId) {
            console.error('ID de notification manquant');
            return;
        }
        
        // Désactiver le clic pendant le traitement
        element.style.pointerEvents = 'none';
        element.style.opacity = '0.7';
        
        fetch(`{{ url('/admin/notifications') }}/${notificationId}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => {
            if (response.ok) {
                // Marquer comme lu visuellement
                element.classList.remove('unread');
                
                // Rediriger vers les nouveaux devis
                window.location.href = '{{ route("admin.devis.new") }}';
            } else {
                throw new Error('Erreur de réseau');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            
            // Restaurer l'état
            element.style.pointerEvents = 'auto';
            element.style.opacity = '1';
            
            alert('Erreur lors de la mise à jour. Veuillez réessayer.');
        });
    }
</script>
@endpush