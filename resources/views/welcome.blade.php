@extends('layouts.app')

@section('title', 'CHICO TRANS - Transport de remorque')

@section('description', 'CHICO TRANS - Solutions de transport fiables et efficaces depuis plus de 20 ans. Transport national, international, logistique complète.')

@push('styles')
<style>
    /* Hero Section - Modern and Clean */
    .hero {
        position: relative;
        height: 75vh;
        min-height: 450px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('/photo.png');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        text-align: center;
        color: white;
    }
    
    .hero-content h1 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 1.2rem;
    }
    
    .hero-text-highlight {
        color: var(--secondary-color);
        font-weight: 600;
    }
    
    .hero-content p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .hero-buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.75rem;
    }
    
    .btn-hero {
        background-color: var(--secondary-color);
        color: white;
        border: none;
        padding: 0.7rem 1.5rem;
        border-radius: 4px;
        font-weight: 500;
        font-size: 0.9rem;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }
    
    .btn-hero-alt {
        background-color: var(--primary-color);
    }
    
    .btn-hero:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: white;
    }
    
    /* Advantages Section - Clean Cards */
    .advantage-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        height: 100%;
        transition: all 0.3s;
        text-align: center;
    }
    
    .advantage-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .advantage-icon {
        font-size: 2rem;
        color: var(--secondary-color);
        margin-bottom: 1rem;
    }
    
    .advantage-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.75rem;
    }
    
    .advantage-text {
        color: var(--grey-color);
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    /* Stats Section - Modern Look */
    .stat-box {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        height: 100%;
        text-align: center;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .stat-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background-color: var(--secondary-color);
        z-index: -1;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        line-height: 1;
    }
    
    .stat-text {
        font-size: 0.95rem;
        color: var(--grey-color);
        font-weight: 500;
    }
    
    /* About Section */
    .about-content h3 {
        color: var(--secondary-color);
        margin-bottom: 1.25rem;
        font-size: 1.5rem;
        font-weight: 600;
        line-height: 1.4;
    }
    
    .about-content p {
        color: var(--grey-color);
        margin-bottom: 1rem;
        line-height: 1.6;
        font-size: 0.95rem;
    }
    
    .about-image img {
        border-radius: 8px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        width: 100%;
    }
    
    /* Services Section - Professional Cards */
    .service-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        padding: 2rem 1.5rem;
        height: 100%;
        transition: all 0.3s;
        text-align: center;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background-color: var(--secondary-color);
        z-index: -1;
    }
    
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }
    
    .service-icon {
        color: var(--secondary-color);
        font-size: 2.5rem;
        margin-bottom: 1.25rem;
    }
    
    .service-title {
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .service-text {
        color: var(--grey-color);
        line-height: 1.6;
        font-size: 0.9rem;
    }
    
    /* CTA Section - Sleek and Modern */
    .cta-section {
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('/photo.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        text-align: center;
        padding: 5rem 0;
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
    
    /* Partners Section */
    .partner-logo {
        height: 70px;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.7;
        transition: all 0.3s;
        margin: 0rem;
    }
    
    .partner-logo:hover {
        filter: grayscale(0%);
        opacity: 1;
    }
    
    /* Contact Section - Professional Layout */
    .contact-info h3 {
        color: var(--secondary-color);
        margin-bottom: 1.5rem;
        font-size: 1.4rem;
        font-weight: 600;
    }
    
    .contact-item {
        margin-bottom: 1.25rem;
        display: flex;
        align-items: flex-start;
    }
    
    .contact-icon {
        color: var(--secondary-color);
        font-size: 1.2rem;
        margin-right: 0.75rem;
        margin-top: 0.25rem;
    }
    
    .contact-text {
        color: var(--grey-color);
        font-size: 0.95rem;
        line-height: 1.5;
    }
    
    .contact-form {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    }
    
    @media (max-width: 767.98px) {
        .hero {
            height: 65vh;
            min-height: 400px;
        }
        
        .hero-content h1 {
            font-size: 1.8rem;
        }
        
        .hero-content p {
            font-size: 0.95rem;
        }
        
        .btn-hero {
            width: 100%;
            margin-bottom: 0.5rem;
        }
        
        .cta-title {
            font-size: 1.6rem;
        }
        
        .cta-text {
            font-size: 0.95rem;
        }
        
        .btn-cta {
            width: 80%;
            margin-bottom: 0.5rem;
        }
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 hero-content">
                    <h1>VOTRE TRANSPORT <span class="hero-text-highlight">NOTRE SPÉCIALITÉ</span></h1>
                    <p>Nous offrons des services de transport nationaux et internationaux fiables et efficaces adaptés à vos besoins spécifiques.</p>
                    <div class="hero-buttons">
                        <a href="/services" class="btn-hero">Découvrir nos services</a>
                        <a href="/devis" class="btn-hero btn-hero-alt">Demander un devis</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Advantages Section -->
    <section class="section-padding section-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h3 class="advantage-title">Livraison Rapide</h3>
                        <p class="advantage-text">Nous garantissons des délais de livraison optimisés pour répondre à vos contraintes temporelles.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="advantage-title">Sécurité Garantie</h3>
                        <p class="advantage-text">Vos marchandises sont assurées et transportées dans des conditions optimales de sécurité.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="advantage-title">Service 24/7</h3>
                        <p class="advantage-text">Notre équipe est disponible à tout moment pour répondre à vos questions et suivre vos expéditions.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="advantage-card">
                        <div class="advantage-icon">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                        <h3 class="advantage-title">Tarifs Compétitifs</h3>
                        <p class="advantage-text">Nous vous proposons les meilleurs prix du marché sans compromettre la qualité de service.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section-padding section-dark" id="stats">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos chiffres clés</h2>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-box">
                        <div class="stat-number"><span class="counter-value" data-count="50">0</span>+</div>
                        <div class="stat-text">Véhicules en route</div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-box">
                        <div class="stat-number"><span class="counter-value" data-count="20">0</span>+</div>
                        <div class="stat-text">Années d'expérience</div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-box">
                        <div class="stat-number"><span class="counter-value" data-count="2000">0</span>+</div>
                        <div class="stat-text">Clients satisfaits</div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-box">
                        <div class="stat-number"><span class="counter-value" data-count="20">0</span>+</div>
                        <div class="stat-text">Pays desservis</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section-padding section-light" id="about">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Qui sommes-nous</h2>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="about-content">
                        <h3>CHICO TRANS, votre partenaire de confiance pour le transport</h3>
                        <p>Fondée il y a plus de 20 ans, CHICO TRANS s'est imposée comme un acteur incontournable dans le secteur du transport de remorques. Notre expérience et notre expertise nous permettent de vous offrir des services de qualité, adaptés à vos besoins spécifiques.</p>
                        <p>Nous nous engageons à respecter les délais de livraison, à garantir la sécurité de vos marchandises et à vous offrir un service client irréprochable. Chez CHICO TRANS, la satisfaction du client est notre priorité absolue.</p>
                        <p>Notre équipe professionnelle et dévouée est à votre disposition pour vous accompagner dans tous vos projets de transport, qu'ils soient nationaux ou internationaux. Notre flotte moderne et diversifiée nous permet de répondre efficacement à tous types de demandes.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-image">
                        <img src="/photo11.png" alt="CHICO TRANS équipe" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section-padding section-dark" id="services">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos services</h2>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card" id="transport-national">
                        <div class="service-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3 class="service-title">Transport national</h3>
                        <p class="service-text">Nous assurons la livraison de vos marchandises partout en France, dans les délais les plus courts possibles. Notre réseau logistique couvre l'ensemble du territoire national.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card" id="transport-international">
                        <div class="service-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3 class="service-title">Transport international</h3>
                        <p class="service-text">Notre réseau de partenaires nous permet d'assurer vos livraisons dans toute l'Europe et au-delà. Nous gérons toutes les formalités douanières pour faciliter vos exportations.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card" id="logistique-complete">
                        <div class="service-icon">
                            <i class="fas fa-dolly"></i>
                        </div>
                        <h3 class="service-title">Logistique complète</h3>
                        <p class="service-text">De l'enlèvement à la livraison, nous prenons en charge toute la chaîne logistique pour vous simplifier la vie. Nos solutions sur mesure s'adaptent à tous les secteurs d'activité.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card" id="stockage-temporaire">
                        <div class="service-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <h3 class="service-title">Stockage temporaire</h3>
                        <p class="service-text">Nous disposons d'entrepôts sécurisés pour stocker temporairement vos marchandises si nécessaire. Notre système de gestion des stocks vous garantit un suivi rigoureux.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call-to-action Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="cta-title" data-aos="fade-up">Prêt à simplifier votre logistique ?</h2>
                    <p class="cta-text" data-aos="fade-up" data-aos-delay="100">Contactez-nous dès aujourd'hui pour discuter de vos besoins en transport et obtenir une solution personnalisée et compétitive.</p>
                    <div class="cta-buttons" data-aos="fade-up" data-aos-delay="200">
                        <a href="/devis" class="btn-cta">Demander un devis</a>
                        <a href="#contact" class="btn-cta btn-cta-outline">Nous contacter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="section-padding section-light" id="partners">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos partenaires</h2>
            <div class="row justify-content-center align-items-center">
                <div class="col-6 col-md-4 col-lg-2 text-center" data-aos="fade-up" data-aos-delay="100">
                    <img src="/partenaire1.jpg" alt="Partenaire 1" class="partner-logo">
                </div>
                <div class="col-6 col-md-4 col-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="/partenaire2.jpg" alt="Partenaire 2" class="partner-logo">
                </div>
                <div class="col-6 col-md-4 col-lg-2 text-center" data-aos="fade-up" data-aos-delay="300">
                    <img src="/partenaire3.png" alt="Partenaire 3" class="partner-logo">
                </div>
                <div class="col-6 col-md-4 col-lg-2 text-center" data-aos="fade-up" data-aos-delay="400">
                    <img src="/partenaire4.jpg" alt="Partenaire 4" class="partner-logo">
                </div>
                <div class="col-6 col-md-4 col-lg-2 text-center" data-aos="fade-up" data-aos-delay="500">
                    <img src="/partenaire5.jpg" alt="Partenaire 5" class="partner-logo">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section-padding section-dark" id="contact">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Contactez-nous</h2>
            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="contact-info">
                        <h3>Nos coordonnées</h3>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                56, RUE IBN AL OUANANE 5020<br>
                                AIN SEBAA CASABLANCA
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                +212 663 094 035
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                transport.chicotrans@gmail.com
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-text">
                                Lun - Ven: 8h00 - 18h00<br>
                                Sam: 9h00 - 12h00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="email" class="form-control" placeholder="Votre email *" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Sujet *" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" placeholder="Votre message *" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn-submit">Envoyer le message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.3825502755503!2d-7.5601347649922115!3d33.595377387654615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cce596bf4917%3A0xdd9decbafb1e0a3b!2s56%20Bd%20Ibn%20Al%20Ouanane%2C%20Casablanca%2020250!5e0!3m2!1sfr!2sma!4v1746217044657!5m2!1sfr!2sma" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Stat Counter Animation
    const counterAnimation = () => {
        $('.counter-value').each(function() {
            const $this = $(this);
            const countTo = $this.attr('data-count');
            
            $({countNum: 0}).animate({
                countNum: countTo
            }, {
                duration: 1500,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    };
    
    // Animation au scroll
    let counterAnimated = false;
    const statsSection = document.querySelector('#stats');
    
    const checkIfInView = () => {
        if (statsSection) {
            const windowHeight = window.innerHeight;
            const elementTop = statsSection.getBoundingClientRect().top;
            
            if (elementTop < windowHeight - 100 && !counterAnimated) {
                counterAnimation();
                counterAnimated = true;
            }
        }
    };
    
    // Check on scroll and on page load
    window.addEventListener('scroll', checkIfInView);
    window.addEventListener('load', checkIfInView);
</script>
@endpush 