<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi en temps réel - CHICO TRANS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        
        .tracking-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.5rem;
        }
        
        .status-transit {
            background-color: #ffc107;
        }
        
        .status-delivered {
            background-color: #28a745;
        }
        
        .status-pending {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4">Suivi en temps réel</h1>
        
        <div class="tracking-card">
            <h5><i class="fas fa-truck me-2"></i>Transport en cours</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Référence:</strong> T-2025-001</p>
                    <p><strong>Destination:</strong> Rabat</p>
                    <p><strong>Départ:</strong> Casablanca</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Statut:</strong> <span class="status-indicator status-transit"></span>En transit</p>
                    <p><strong>Heure estimée:</strong> 14:30</p>
                    <p><strong>Progression:</strong> 65%</p>
                </div>
            </div>
            <div class="progress mt-3">
                <div class="progress-bar bg-warning" style="width: 65%"></div>
            </div>
        </div>
        
        <div class="tracking-card">
            <h5><i class="fas fa-check-circle me-2 text-success"></i>Transport terminé</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Référence:</strong> T-2025-002</p>
                    <p><strong>Destination:</strong> Marrakech</p>
                    <p><strong>Départ:</strong> Casablanca</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Statut:</strong> <span class="status-indicator status-delivered"></span>Livré</p>
                    <p><strong>Heure de livraison:</strong> 12:45</p>
                    <p><strong>Progression:</strong> 100%</p>
                </div>
            </div>
            <div class="progress mt-3">
                <div class="progress-bar bg-success" style="width: 100%"></div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <p class="text-muted">
                <i class="fas fa-info-circle me-2"></i>
                Les informations de suivi sont mises à jour toutes les 15 minutes.
            </p>
        </div>
    </div>
</body>
</html>