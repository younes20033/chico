@extends('layouts.app')

@section('title', 'CHICO TRANS - Contactez-nous')

@section('description', 'Contactez CHICO TRANS pour vos besoins de transport. Notre équipe est à votre disposition pour vous accompagner dans tous vos projets.')

@push('styles')
<style>
    /* Page Header */
    .page-header {
        position: relative;
        height: 50vh;
        min-height: 300px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/photo.png');
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
    
    /* Contact Info Styles */
    .contact-info-item {
        display: flex;
        margin-bottom: 1.5rem;
        align-items: flex-start;
    }
    
    .contact-icon {
        color: var(--secondary-color);
        font-size: 1.5rem;
        margin-right: 1rem;
        min-width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(209, 51, 51, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .contact-details h4 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }
    
    .contact-details p {
        color: var(--grey-color);
        margin-bottom: 0;
        font-size: 0.95rem;
        line-height: 1.5;
    }
    
    /* Contact Form */
    .contact-form {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 2rem;
    }
    
    .form-label {
        font-size: 0.9rem;
        color: var(--grey-color);
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        margin-bottom: 1.2rem;
    }
    
    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }
    
    /* Map Section */
    .map-container {
        height: 450px;
        width: 100%;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
        overflow: hidden;
    }
    
    /* CTA Section */
    .cta-section {
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('/photo.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 5rem 0;
        color: white;
        text-align: center;
    }
    
    .cta-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 1.25rem;
    }
    
    .cta-text {
        font-size: 1.05rem;
        margin-bottom: 2rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .cta-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .btn-cta {
        background-color: var(--secondary-color);
        color: white;
        border: none;
        padding: 0.7rem 1.5rem;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.3s;
        text-decoration: none;
        font-size: 0.9rem;
    }
    
    .btn-cta-outline {
        background-color: transparent;
        border: 1px solid white;
    }
    
    .btn-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        color: white;
    }
    
    .btn-cta-outline:hover {
        background-color: rgba(255, 255, 255, 0.1);
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
        
        .map-container {
            height: 350px;
            margin-top: 2rem;
        }
        
        .btn-cta {
            width: 80%;
            margin-bottom: 0.5rem;
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
                    <h1 class="page-title" data-aos="fade-up">Contactez-nous</h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="100">Vous avez des questions ou besoin d'un devis ? Notre équipe est à votre disposition pour vous accompagner dans tous vos projets de transport.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Contact Details Section -->
    <section class="section-padding section-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos Coordonnées</h2>
            
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Notre adresse</h4>
                            <p>56, RUE IBN AL OUANANE 5020<br>AIN SEBAA CASABLANCA</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Téléphone</h4>
                            <p>+212 663 094 035</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>transport.chicotrans@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="section-padding section-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <h2 class="section-title">Envoyez-nous un message</h2>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
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
                    
                    <div class="contact-form">
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom complet *</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Téléphone</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Sujet *</label>
                                    <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea id="message" name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn-submit">
                                        <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="section-title">Où nous trouver</h2>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.3825502755503!2d-7.5601347649922115!3d33.595377387654615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cce596bf4917%3A0xdd9decbafb1e0a3b!2s56%20Bd%20Ibn%20Al%20Ouanane%2C%20Casablanca%2020250!5e0!3m2!1sfr!2sma!4v1746217044657!5m2!1sfr!2sma" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="cta-title" data-aos="fade-up">Prêt à simplifier votre logistique ?</h2>
                    <p class="cta-text" data-aos="fade-up" data-aos-delay="100">Contactez-nous dès aujourd'hui pour discuter de vos besoins en transport et obtenir une solution personnalisée et compétitive.</p>
                    <div class="cta-buttons" data-aos="fade-up" data-aos-delay="200">
                        <a href="/devis" class="btn-cta">Demander un devis</a>
                        <a href="/contactez-nous" class="btn-cta btn-cta-outline">Nous appeler</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection