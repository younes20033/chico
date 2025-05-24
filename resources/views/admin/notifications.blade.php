@extends('layouts.app')

@section('title', 'Notifications - Admin CHICO TRANS')

@section('description', 'Interface d\'administration pour gérer les notifications CHICO TRANS.')

@push('styles')
<style>
    .notification-item {
        background-color: white;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border-left: 4px solid #d13333;
    }
    
    .notification-item.read {
        opacity: 0.7;
        border-left-color: #6c757d;
    }
    
    .notification-meta {
        font-size: 0.85rem;
        color: #6c757d;
    }
</style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Toutes les notifications</h1>
            <form action="{{ route('admin.notifications.mark-all-read') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-secondary">
                    <i class="fas fa-check-double"></i> Marquer tout comme lu
                </button>
            </form>
        </div>
        
        @if($notifications->count() > 0)
            @foreach($notifications as $notification)
                <div class="notification-item {{ $notification->read ? 'read' : '' }}">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="mb-1">{{ $notification->title }}</h6>
                            <p class="mb-1">{{ $notification->message }}</p>
                            <div class="notification-meta">
                                {{ $notification->created_at->diffForHumans() }}
                                @if($notification->read)
                                    - Lu le {{ $notification->read_at->format('d/m/Y à H:i') }}
                                @endif
                            </div>
                        </div>
                        @if(!$notification->read)
                            <form action="{{ route('admin.notifications.read', $notification->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    Marquer comme lu
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
            
            {{ $notifications->links() }}
        @else
            <div class="text-center py-5">
                <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
                <h4>Aucune notification</h4>
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour au dashboard
            </a>
        </div>
    </div>
@endsection