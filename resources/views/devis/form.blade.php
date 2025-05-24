@extends('layouts.app')

@section('title', 'CHICO TRANS - Demande de devis')

@section('description', 'Obtenez un devis personnalisé pour vos besoins de transport avec CHICO TRANS. Formulaire simple et rapide.')

@push('styles')
<style>
    /* Page Header */
    .page-header {
        position: relative;
        height: 50vh;
        min-height: 300px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/img21.jpeg');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 0px;
    }
    
    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.2rem;
    }
    
    .page-description {
        font-size: 1.1rem;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    /* Devis Form Styles */
    .devis-info-section {
        margin-bottom: 3rem;
        text-align: center;
    }
    
    .devis-title {
        color: var(--secondary-color);
        font-size: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .devis-info-text {
        color: var(--grey-color);
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    .form-container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 2rem;
        margin-bottom: 3rem;
    }
    
    .form-section-title {
        color: var(--primary-color);
        font-size: 1.3rem;
        margin-bottom: 1.5rem;
        font-weight: 600;
        border-left: 4px solid var(--secondary-color);
        padding-left: 15px;
    }
    
    .form-label {
        font-size: 0.9rem;
        color: var(--grey-color);
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        padding: 0.75rem;
        border: 1px solid #e1e1e1;
        border-radius: 4px;
        font-size: 0.95rem;
        transition: all 0.3s;
        margin-bottom: 1.2rem;
    }
    
    .form-control:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(209, 51, 51, 0.15);
    }
    
    /* Transport items */
    .transport-item {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        position: relative;
        border-left: 4px solid var(--secondary-color);
    }
    
    .remove-transport {
        position: absolute;
        top: 10px;
        right: 10px;
        color: var(--secondary-color);
        background: none;
        border: none;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .remove-transport:hover {
        transform: scale(1.2);
    }
    
    .add-transport-btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 2rem;
        display: inline-flex;
        align-items: center;
        font-size: 0.9rem;
        transition: all 0.3s;
    }
    
    .add-transport-btn i {
        margin-right: 0.5rem;
    }
    
    .add-transport-btn:hover {
        background-color: #3d3d3d;
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Totals Section */
    .totals-preview {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-left: 4px solid var(--secondary-color);
    }
    
    .totals-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .totals-table td {
        padding: 10px;
        border-bottom: 1px solid #e1e1e1;
    }
    
    .totals-table td:last-child {
        text-align: right;
        font-weight: 600;
    }
    
    .total-row {
        font-weight: bold;
        color: var(--secondary-color);
    }
    
    .total-row td {
        padding-top: 15px;
        font-size: 1.1rem;
    }
    
    /* Submit button */
    .btn-submit {
        background-color: var(--secondary-color);
        color: white;
        border: none;
        padding: 0.8rem 2.5rem;
        border-radius: 4px;
        font-weight: 500;
        font-size: 1rem;
        transition: all 0.3s;
        text-transform: uppercase;
    }
    
    .btn-submit:hover {
        background-color: #c0392b;
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .page-header {
            height: 40vh;
            min-height: 250px;
        }
        
        .page-title {
            font-size: 2rem;
        }
        
        .page-description {
            font-size: 1rem;
        }
        
        .form-container {
            padding: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="page-title" data-aos="fade-up">Demande de devis</h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="100">Remplissez le formulaire ci-dessous pour obtenir un devis personnalisé pour vos besoins de transport.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Devis Form Section -->
    <section class="section-padding section-light">
        <div class="container">
            <div class="devis-info-section" data-aos="fade-up">
                <h2 class="devis-title">Obtenez votre devis en quelques clics</h2>
                <p class="devis-info-text">CHICO TRANS vous propose un service de devis rapide et personnalisé. Remplissez le formulaire ci-dessous avec les détails de votre demande de transport, et nous vous enverrons un devis précis que vous pourrez télécharger immédiatement au format PDF.</p>
            </div>
            
            <div class="form-container" data-aos="fade-up">
                <form id="devisForm" action="{{ route('devis.generate') }}" method="POST">
                    @csrf
                    
                    <!-- Informations client -->
                    <h3 class="form-section-title">Informations client</h3>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="company_name" class="form-label">Nom de l'entreprise *</label>
                            <input type="text" id="company_name" name="company_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ice" class="form-label">ICE (Identifiant Commun de l'Entreprise)</label>
                            <input type="text" id="ice" name="ice" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="contact_name" class="form-label">Nom du contact *</label>
                            <input type="text" id="contact_name" name="contact_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="telephone" class="form-label">Téléphone *</label>
                            <input type="tel" id="telephone" name="telephone" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Adresse complète *</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="city" class="form-label">Ville *</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="postal_code" class="form-label">Code postal</label>
                            <input type="text" id="postal_code" name="postal_code" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Taux de TVA -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tva_rate" class="form-label">Taux de TVA (%) *</label>
                            <input type="number" step="0.01" id="tva_rate" name="tva_rate" class="form-control" value="13" required>
                        </div>
                    </div>
                    
                    <!-- Transports demandés -->
                    <h3 class="form-section-title mt-4">Détails des transports demandés</h3>
                    
                    <div id="transports-container">
                        <div class="transport-item">
                            <button type="button" class="remove-transport" onclick="removeTransport(this)" style="display: none;"><i class="fas fa-times"></i></button>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Date souhaitée *</label>
                                    <input type="date" name="transports[0][date]" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Destination *</label>
                                    <input type="text" name="transports[0][destination]" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Type de véhicule *</label>
                                    <select name="transports[0][vehicle_type]" class="form-control" required>
                                        <option value="" disabled selected>Sélectionnez un type de véhicule</option>
                                        <option value="Semi Remorque">Semi Remorque</option>
                                        <option value="Plateau 12 M">Plateau 12 M</option>
                                        <option value="Fourgon">Fourgon</option>
                                        <option value="Benne">Benne</option>
                                        <option value="Citerne">Citerne</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Prix HT *</label>
                                    <input type="number" step="0.01" name="transports[0][price]" class="form-control price-input" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Référence (optionnel)</label>
                                    <input type="text" name="transports[0][reference]" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Description (optionnel)</label>
                                    <input type="text" name="transports[0][description]" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mb-4">
                        <button type="button" id="add-transport" class="add-transport-btn">
                            <i class="fas fa-plus"></i> Ajouter un transport
                        </button>
                    </div>
                    
                    <!-- Aperçu des totaux -->
                    <div class="totals-preview">
                        <h4 class="mb-3">Aperçu des totaux</h4>
                        <table class="totals-table">
                            <tr>
                                <td>Total HT :</td>
                                <td id="totalHT">0.00 DH</td>
                            </tr>
                            <tr>
                                <td>TVA (<span id="tvaRateDisplay">13</span>%) :</td>
                                <td id="totalTVA">0.00 DH</td>
                            </tr>
                            <tr class="total-row">
                                <td>Total TTC :</td>
                                <td id="totalTTC">0.00 DH</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <label for="special_requirements" class="form-label">Exigences particulières ou commentaires</label>
                            <textarea id="special_requirements" name="special_requirements" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-check mt-4 mb-4">
                        <input class="form-check-input" type="checkbox" id="terms_checkbox" name="terms" required>
                        <label class="form-check-label" for="terms_checkbox">
                            J'accepte que CHICO TRANS traite mes données personnelles conformément à sa politique de confidentialité pour répondre à ma demande de devis.
                        </label>
                    </div>
                    
                    <div class="text-center">
                        <!-- Bouton pour télécharger le PDF -->
                        <button type="submit" name="action" value="download" class="btn-submit me-3">
                            <i class="fas fa-download me-1"></i> Générer mon devis PDF
                        </button>
                        
                        <!-- Bouton pour soumettre à l'administration -->
                        @auth
                            <button type="submit" name="action" value="submit" class="btn-submit" style="background-color: var(--primary-color);">
                                <i class="fas fa-paper-plane me-1"></i> Soumettre à l'administration
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="btn-submit" style="background-color: var(--primary-color); text-decoration: none; display: inline-block;">
                                <i class="fas fa-paper-plane me-1"></i> Soumettre à l'administration
                            </a>
                        @endauth
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Transport counter
    let transportCount = 1;
    
    // Function to add a new transport
    function addTransport() {
        const container = document.getElementById('transports-container');
        const newItem = document.createElement('div');
        newItem.className = 'transport-item';
        
        newItem.innerHTML = `
            <button type="button" class="remove-transport" onclick="removeTransport(this)"><i class="fas fa-times"></i></button>
            
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Date souhaitée *</label>
                    <input type="date" name="transports[${transportCount}][date]" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Destination *</label>
                    <input type="text" name="transports[${transportCount}][destination]" class="form-control" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Type de véhicule *</label>
                    <select name="transports[${transportCount}][vehicle_type]" class="form-control" required>
                        <option value="" disabled selected>Sélectionnez un type de véhicule</option>
                        <option value="Semi Remorque">Semi Remorque</option>
                        <option value="Plateau 12 M">Plateau 12 M</option>
                        <option value="Fourgon">Fourgon</option>
                        <option value="Benne">Benne</option>
                        <option value="Citerne">Citerne</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Prix HT *</label>
                    <input type="number" step="0.01" name="transports[${transportCount}][price]" class="form-control price-input" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Référence (optionnel)</label>
                    <input type="text" name="transports[${transportCount}][reference]" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Description (optionnel)</label>
                    <input type="text" name="transports[${transportCount}][description]" class="form-control">
                </div>
            </div>
        `;
        
        container.appendChild(newItem);
        
        // Add event listener to the new price input
        const newPriceInput = newItem.querySelector('.price-input');
        if (newPriceInput) {
            newPriceInput.addEventListener('input', calculateTotals);
        }
        
        transportCount++;
        
        // Show remove buttons if there's more than one transport
        const removeButtons = document.querySelectorAll('.remove-transport');
        if (removeButtons.length > 1) {
            removeButtons.forEach(button => {
                button.style.display = 'block';
            });
        }
        
        // Calculate totals after adding new transport
        calculateTotals();
    }
    
    // Function to remove a transport
    function removeTransport(button) {
        const transportItem = button.parentNode;
        transportItem.parentNode.removeChild(transportItem);
        
        // Hide remove buttons if there's only one transport left
        const removeButtons = document.querySelectorAll('.remove-transport');
        if (removeButtons.length <= 1) {
            removeButtons.forEach(button => {
                button.style.display = 'none';
            });
        }
        
        // Calculate totals after removing transport
        calculateTotals();
    }
    
    // Function to calculate totals
    function calculateTotals() {
        let totalHT = 0;
        
        // Get all price inputs
        document.querySelectorAll('.price-input').forEach(input => {
            const price = parseFloat(input.value) || 0;
            totalHT += price;
        });
        
        // Calculate TVA and TTC
        const tvaRate = parseFloat(document.getElementById('tva_rate').value) / 100 || 0;
        document.getElementById('tvaRateDisplay').textContent = document.getElementById('tva_rate').value;
        
        const totalTVA = totalHT * tvaRate;
        const totalTTC = totalHT + totalTVA;
        
        // Update display
        document.getElementById('totalHT').textContent = totalHT.toFixed(2) + ' DH';
        document.getElementById('totalTVA').textContent = totalTVA.toFixed(2) + ' DH';
        document.getElementById('totalTTC').textContent = totalTTC.toFixed(2) + ' DH';
    }
    
    // Document ready function
    document.addEventListener('DOMContentLoaded', function() {
        // Add transport button functionality
        document.getElementById('add-transport').addEventListener('click', function() {
            addTransport();
        });
        
        // Update TVA rate display when input changes
        document.getElementById('tva_rate').addEventListener('input', function() {
            document.getElementById('tvaRateDisplay').textContent = this.value;
            calculateTotals();
        });
        
        // Add event listeners to price inputs for calculating totals
        document.querySelectorAll('.price-input').forEach(function(input) {
            input.addEventListener('input', calculateTotals);
        });
        
        // Initialize totals calculation
        calculateTotals();
    });
</script>
@endpush