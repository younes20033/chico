<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Candidature Partenaire - Admin CHICO TRANS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4d4d4d;
            --secondary-color: #d13333;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        
        .admin-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            border-radius: 10px 10px 0 0;
            margin: -2rem -2rem 1.5rem -2rem;
        }
        
        .info-group {
            margin-bottom: 1rem;
        }
        
        .info-label {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.25rem;
            font-weight: 500;
        }
        
        .info-value {
            font-weight: 500;
            color: var(--primary-color);
        }
        
        .badge-status {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 500;
            border-radius: 20px;
        }
        
        .badge-pending { background-color: #ffc107; color: #212529; }
        .badge-approved { background-color: #28a745; color: white; }
        .badge-rejected { background-color: #dc3545; color: white; }
        
        .btn-action {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .partner-type {
            background-color: #17a2b8;
            color: white;
            padding: 0.35rem 0.65rem;
            border-radius: 15px;
            font-size: 0.75em;
            font-weight: 500;
        }
        
        .message-box {
            background-color: #f8f9fa;
            border-left: 4px solid var(--secondary-color);
            padding: 1rem;
            border-radius: 0 5px 5px 0;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Détails de la candidature</h1>
            <a href="{{ route('admin.partners') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <!-- Informations de l'entreprise -->
        <div class="admin-card">
            <div class="card-header">
                <i class="fas fa-building me-2"></i>Informations de l'entreprise
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="info-group">
                        <div class="info-label">Nom de l'entreprise</div>
                        <div class="info-value">{{ $partner->company_name }}</div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Secteur d'activité</div>
                        <div class="info-value">{{ $partner->activity }}</div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Type de partenariat souhaité</div>
                        <div class="info-value">
                            <span class="partner-type">{{ $partner->getPartnershipTypeLabel() }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="info-group">
                        <div class="info-label">Site web</div>
                        <div class="info-value">
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" class="text-decoration-none">
                                    {{ $partner->website }} <i class="fas fa-external-link-alt ms-1"></i>
                                </a>
                            @else
                                Non renseigné
                            @endif
                        </div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Localisation</div>
                        <div class="info-value">{{ $partner->location }}</div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Statut</div>
                        <div class="info-value">
                            @if($partner->status === 'pending')
                                <span class="badge badge-status badge-pending">En attente</span>
                            @elseif($partner->status === 'approved')
                                <span class="badge badge-status badge-approved">Approuvé</span>
                            @elseif($partner->status === 'rejected')
                                <span class="badge badge-status badge-rejected">Rejeté</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Informations de contact -->
        <div class="admin-card">
            <div class="card-header">
                <i class="fas fa-user me-2"></i>Informations de contact
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="info-group">
                        <div class="info-label">Nom du contact</div>
                        <div class="info-value">{{ $partner->contact_name }}</div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Fonction</div>
                        <div class="info-value">{{ $partner->position }}</div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="info-group">
                        <div class="info-label">Email</div>
                        <div class="info-value">
                            <a href="mailto:{{ $partner->email }}" class="text-decoration-none">
                                {{ $partner->email }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Téléphone</div>
                        <div class="info-value">
                            <a href="tel:{{ $partner->phone }}" class="text-decoration-none">
                                {{ $partner->phone }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Message de motivation -->
        <div class="admin-card">
            <div class="card-header">
                <i class="fas fa-comment me-2"></i>Message de motivation
            </div>
            
            <div class="message-box">
                <p class="mb-0">{{ $partner->message }}</p>
            </div>
        </div>
        
        <!-- Informations administratives -->
        <div class="admin-card">
            <div class="card-header">
                <i class="fas fa-info-circle me-2"></i>Informations administratives
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="info-group">
                        <div class="info-label">Date de candidature</div>
                        <div class="info-value">{{ $partner->created_at->format('d/m/Y à H:i') }}</div>
                    </div>
                    
                    @if($partner->contacted_at)
                        <div class="info-group">
                            <div class="info-label">Date de contact</div>
                            <div class="info-value">{{ $partner->contacted_at->format('d/m/Y à H:i') }}</div>
                        </div>
                    @endif
                </div>
                
                <div class="col-md-6">
                    @if($partner->admin_notes)
                        <div class="info-group">
                            <div class="info-label">Notes administratives</div>
                            <div class="info-value">{{ $partner->admin_notes }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Actions administrateur -->
        @if($partner->status === 'pending')
            <div class="admin-card">
                <div class="card-header">
                    <i class="fas fa-tools me-2"></i>Actions administrateur
                </div>
                
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="admin_notes" class="form-label">Notes administratives (optionnel)</label>
                        <textarea class="form-control" id="admin_notes" rows="3" placeholder="Ajoutez des notes concernant cette candidature..."></textarea>
                    </div>
                </div>
                
                <div class="d-flex gap-2">
                    <form action="{{ route('admin.partners.update-status', $partner->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="approved">
                        <input type="hidden" name="admin_notes" id="approve_notes">
                        <button type="submit" class="btn btn-success btn-action" onclick="this.previousElementSibling.value = document.getElementById('admin_notes').value; return confirm('Êtes-vous sûr de vouloir approuver cette candidature ?')">
                            <i class="fas fa-check"></i> Approuver la candidature
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.partners.update-status', $partner->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="rejected">
                        <input type="hidden" name="admin_notes" id="reject_notes">
                        <button type="submit" class="btn btn-danger btn-action" onclick="this.previousElementSibling.value = document.getElementById('admin_notes').value; return confirm('Êtes-vous sûr de vouloir rejeter cette candidature ?')">
                            <i class="fas fa-times"></i> Rejeter la candidature
                        </button>
                    </form>
                    
                    <a href="mailto:{{ $partner->email }}?subject=Candidature de partenariat - {{ $partner->company_name }}" class="btn btn-info btn-action">
                        <i class="fas fa-envelope"></i> Contacter par email
                    </a>
                    
                    <a href="tel:{{ $partner->phone }}" class="btn btn-outline-primary btn-action">
                        <i class="fas fa-phone"></i> Appeler
                    </a>
                </div>
            </div>
        @endif
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>