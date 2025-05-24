@extends('layouts.app')

@section('title', 'CHICO TRANS - Devenir Partenaire')

@section('description', 'Rejoignez notre réseau de partenaires professionnels et développons ensemble un partenariat mutuellement bénéfique pour une croissance partagée.')

@push('styles')
<style>
    /* Page Header */
    .page-header {
        position: relative;
        height: 60vh;
        min-height: 350px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/photo.png');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 0;
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
    
    /* Why Partner Section */
    .why-partner {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    
    .why-partner-content h3 {
        color: var(--secondary-color);
        margin-bottom: 1.25rem;
        font-size: 1.5rem;
        font-weight: 600;
        line-height: 1.4;
    }
    
    .why-partner-content p {
        color: var(--grey-color);
        margin-bottom: 1rem;
        line-height: 1.6;
        font-size: 0.95rem;
    }
    
    .why-partner-image img {
        border-radius: 8px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        width: 100%;
        height: auto;
    }
    
    /* Benefits Cards */
    .benefit-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        height: 100%;
        transition: all 0.3s;
        text-align: center;
    }
    
    .benefit-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .benefit-icon {
        font-size: 2rem;
        color: var(--secondary-color);
        margin-bottom: 1rem;
    }
    
    .benefit-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.75rem;
    }
    
    .benefit-text {
        color: var(--grey-color);
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    /* Process Steps */
    .process-container {
        margin-top: 3rem;
    }
    
    .process-step {
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
    }
    
    .step-number {
        width: 70px;
        height: 70px;
        background-color: var(--secondary-color);
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0 auto 1.2rem;
    }
    
    .step-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.8rem;
    }
    
    .step-title1 {
        font-size: 1.2rem;
        font-weight: 600;
        color: white;
        margin-bottom: 0.8rem;
    }
    
    .step-description {
        color: var(--grey-color);
        font-size: 0.9rem;
        line-height: 1.6;
        max-width: 250px;
        margin: 0 auto;
    }
    
    /* Partner Form Section */
    .partner-form-section {
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('/photo.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        text-align: center;
        padding: 5rem 0;
    }
    
    .partner-form-container {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .partner-form {
        background-color: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        margin-top: 2rem;
    }
    
    .form-label {
        font-size: 0.9rem;
        color: var(--grey-color);
        font-weight: 500;
        text-align: left;
        display: block;
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
    
    .form-check {
        margin-top: 1rem;
        text-align: left;
    }
    
    .form-check-input {
        margin-right: 0.5rem;
    }
    
    .form-check-label {
        font-size: 0.85rem;
        color: var(--grey-color);
    }
    
    .btn-submit {
        background-color: var(--secondary-color);
        color: white;
        border: none;
        padding: 0.7rem 2rem;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.3s;
        margin-top: 1.5rem;
        font-size: 1rem;
    }
    
    .btn-submit:hover {
        background-color: #c0392b;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    /* FAQ Accordion */
    .accordion-item {
        margin-bottom: 1rem;
        border: none;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .accordion-button {
        font-weight: 600;
        color: var(--primary-color);
        background-color: white;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        padding: 1.2rem;
    }
    
    .accordion-button:not(.collapsed) {
        color: var(--secondary-color);
        background-color: white;
    }
    
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(209, 51, 51, 0.25);
    }
    
    .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23d13333'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }
    
    .accordion-body {
        padding: 1.2rem;
        background-color: #f9f9f9;
        color: var(--grey-color);
        font-size: 0.95rem;
        line-height: 1.6;
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .page-header {
            height: 50vh;
            min-height: 300px;
        }
        
        .page-title {
            font-size: 2rem;
        }
        
        .page-description {
            font-size: 1rem;
        }
        
        .section-title {
            font-size: 1.6rem;
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
                    <h1 class="page-title" data-aos="fade-up">Devenir Partenaire</h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="100">Rejoignez notre réseau de partenaires professionnels et développons ensemble un partenariat mutuellement bénéfique pour une croissance partagée.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Why Partner Section -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Pourquoi devenir partenaire ?</h2>
            
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="why-partner-content">
                        <h3>Un partenariat stratégique pour votre entreprise</h3>
                        <p>Chez CHICO TRANS, nous croyons fermement au pouvoir de la collaboration. Notre programme de partenariat a été conçu pour créer des relations d'affaires durables et mutuellement bénéfiques avec des entreprises qui partagent nos valeurs d'excellence, de fiabilité et d'innovation.</p>
                        <p>Que vous soyez un transporteur indépendant, une société de logistique, un agent commercial ou une entreprise cherchant à optimiser sa chaîne d'approvisionnement, notre programme de partenariat vous offre des opportunités uniques de croissance et de développement.</p>
                        <p>Nous mettons à votre disposition notre expertise, notre réseau étendu et nos ressources pour vous aider à atteindre vos objectifs commerciaux tout en créant une synergie qui profite à tous les acteurs impliqués.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="why-partner-image">
                        <img src="/photo11.png" alt="Partenariat CHICO TRANS" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="section-padding section-dark">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Les avantages de notre partenariat</h2>
            
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="benefit-title">Relation de confiance</h3>
                        <p class="benefit-text">Nous établissons des relations durables basées sur la confiance mutuelle et la transparence. Vous serez considéré comme un véritable partenaire, pas simplement comme un fournisseur ou un client.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3 class="benefit-title">Avantages financiers</h3>
                        <p class="benefit-text">Bénéficiez de conditions tarifaires préférentielles, de commissions attractives sur les affaires apportées et de modalités de paiement adaptées à vos besoins pour une relation commerciale optimale.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3 class="benefit-title">Réseau international</h3>
                        <p class="benefit-text">Accédez à notre réseau international de clients et de partenaires. Élargissez votre portée commerciale et développez votre activité sur de nouveaux marchés avec notre soutien.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3 class="benefit-title">Support technique</h3>
                        <p class="benefit-text">Profitez de notre expertise technique et logistique. Nos équipes vous accompagnent dans l'optimisation de vos processus et la résolution des défis opérationnels.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h3 class="benefit-title">Visibilité marketing</h3>
                        <p class="benefit-text">Gagnez en visibilité grâce à nos actions marketing conjointes. Votre entreprise sera mise en avant dans nos supports de communication et lors de nos événements professionnels.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="benefit-title">Formation continue</h3>
                        <p class="benefit-text">Accédez à des programmes de formation spécifiques au secteur du transport et de la logistique. Développez les compétences de vos équipes pour rester à la pointe de l'innovation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Process -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Le processus de partenariat</h2>
            
            <div class="row process-container">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h3 class="step-title">Candidature</h3>
                        <p class="step-description">Remplissez le formulaire de candidature ci-dessous pour exprimer votre intérêt à devenir partenaire de CHICO TRANS.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h3 class="step-title">Évaluation</h3>
                        <p class="step-description">Notre équipe évalue votre candidature et vous contacte pour discuter des détails et des opportunités potentielles.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h3 class="step-title">Accord</h3>
                        <p class="step-description">Nous élaborons ensemble un accord de partenariat adapté à vos besoins et objectifs spécifiques.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h3 class="step-title">Collaboration</h3>
                        <p class="step-description">Le partenariat est lancé ! Nous commençons à collaborer activement pour atteindre nos objectifs communs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Form Section -->
    <section class="section-padding partner-form-section">
        <div class="container">
            <div class="partner-form-container">
                <h2 class="section-title1" data-aos="fade-up">Rejoignez-nous dès aujourd'hui</h2>
                <p data-aos="fade-up" data-aos-delay="100">Remplissez le formulaire ci-dessous pour exprimer votre intérêt à devenir partenaire de CHICO TRANS. Notre équipe vous contactera dans les plus brefs délais pour discuter des opportunités de collaboration.</p>
                
                <div class="partner-form" data-aos="fade-up" data-aos-delay="200">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('partner.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="company_name" class="form-label">Nom de l'entreprise *</label>
                                <input type="text" id="company_name" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" required>
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="form-label">Fonction *</label>
                                <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" required>
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="contact_name" class="form-label">Nom du contact *</label>
                                <input type="text" id="contact_name" name="contact_name" class="form-control @error('contact_name') is-invalid @enderror" value="{{ old('contact_name') }}" required>
                                @error('contact_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="activity" class="form-label">Secteur d'activité *</label>
                                <input type="text" id="activity" name="activity" class="form-control @error('activity') is-invalid @enderror" value="{{ old('activity') }}" required>
                                @error('activity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email professionnel *</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Téléphone *</label>
                                <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="location" class="form-label">Ville/Pays *</label>
                                <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="website" class="form-label">Site web</label>
                                <input type="url" id="website" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="partnership_type" class="form-label">Type de partenariat souhaité *</label>
                                <select id="partnership_type" name="partnership_type" class="form-control @error('partnership_type') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('partnership_type') ? '' : 'selected' }}>Sélectionnez une option</option>
                                    <option value="transporteur" {{ old('partnership_type') == 'transporteur' ? 'selected' : '' }}>Transporteur</option>
                                    <option value="agent_commercial" {{ old('partnership_type') == 'agent_commercial' ? 'selected' : '' }}>Agent commercial</option>
                                    <option value="logistique" {{ old('partnership_type') == 'logistique' ? 'selected' : '' }}>Prestataire logistique</option>
                                    <option value="distributeur" {{ old('partnership_type') == 'distributeur' ? 'selected' : '' }}>Distributeur</option>
                                    <option value="autre" {{ old('partnership_type') == 'autre' ? 'selected' : '' }}>Autre</option>
                                </select>
                                @error('partnership_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="message" class="form-label">Comment envisagez-vous la collaboration avec CHICO TRANS ? *</label>
                                <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" rows="4" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-check">
                            <input type="checkbox" id="terms" name="terms" class="form-check-input @error('terms') is-invalid @enderror" {{ old('terms') ? 'checked' : '' }} required>
                            <label for="terms" class="form-check-label">J'accepte que CHICO TRANS traite mes données personnelles conformément à sa politique de confidentialité pour répondre à ma demande de partenariat.</label>
                            @error('terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane me-2"></i>
                                Soumettre ma candidature
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Questions fréquentes</h2>
            
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Quels sont les critères pour devenir partenaire de CHICO TRANS ?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Pour devenir partenaire de CHICO TRANS, nous recherchons des entreprises partageant nos valeurs d'excellence et de fiabilité. Les critères incluent notamment une expérience établie dans votre domaine, une réputation solide, une stabilité financière et un engagement envers la qualité de service. Chaque candidature est évaluée individuellement pour déterminer le potentiel de synergie.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Quels types de partenariats proposez-vous ?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Nous proposons plusieurs types de partenariats adaptés à différents profils d'entreprises : partenariats avec des transporteurs indépendants, collaborations avec des agents commerciaux, alliances avec des prestataires logistiques complémentaires, partenariats avec des distributeurs, et accords avec des entreprises technologiques. Chaque partenariat est personnalisé selon vos besoins spécifiques et nos objectifs communs.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Quelle est la durée d'un contrat de partenariat ?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            La durée standard d'un contrat de partenariat est d'un an, renouvelable. Nous commençons généralement par cette période pour évaluer la collaboration et ses résultats. Cependant, nous sommes flexibles et pouvons ajuster cette durée en fonction des spécificités du partenariat et des objectifs fixés ensemble.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Quel soutien puis-je attendre de CHICO TRANS en tant que partenaire ?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            En tant que partenaire, vous bénéficierez d'un accompagnement complet incluant : un support commercial pour le développement de votre activité, un soutien technique et logistique, des formations spécifiques, un accès à notre réseau international, une visibilité marketing sur nos différents canaux de communication, et un interlocuteur dédié pour répondre à vos besoins quotidiens.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Comment se déroule le processus de candidature ?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Le processus débute par le remplissage du formulaire de candidature sur cette page. Notre équipe examine ensuite votre demande et vous contacte pour une première discussion. Si le potentiel de collaboration est confirmé, nous organisons une rencontre pour approfondir les détails. Enfin, nous élaborons ensemble un accord de partenariat personnalisé. Le processus complet prend généralement entre 2 et 4 semaines.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection