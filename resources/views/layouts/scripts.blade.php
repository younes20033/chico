<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- AOS - Animation On Scroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
    // AOS Initialization
    AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Navigation smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if(this.getAttribute('href') !== '#' && 
               !this.getAttribute('href').includes('Modal') && 
               document.querySelector(this.getAttribute('href'))) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                const navbar = document.querySelector('.navbar');
                const navbarHeight = navbar ? navbar.offsetHeight : 0;
                
                window.scrollTo({
                    top: targetElement.offsetTop - navbarHeight - 20,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Back to top button
    const backToTopButton = document.getElementById('backToTop');
    
    if (backToTopButton) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('visible');
            } else {
                backToTopButton.classList.remove('visible');
            }
        });
        
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Add padding to body for fixed navbar only
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.querySelector('.navbar');
        
        if (navbar && navbar.classList.contains('fixed-top')) {
            const navbarHeight = navbar.offsetHeight;
            document.body.style.paddingTop = navbarHeight + 'px';
            
            // Update padding when window is resized
            window.addEventListener('resize', function() {
                const newNavbarHeight = navbar.offsetHeight;
                document.body.style.paddingTop = newNavbarHeight + 'px';
            });
        }
        
        // Active nav item based on scroll position (only for pages with sections)
        const sections = document.querySelectorAll('section[id]');
        
        if (sections.length > 0) {
            function navHighlighter() {
                const scrollY = window.pageYOffset;
                
                sections.forEach(current => {
                    const sectionHeight = current.offsetHeight;
                    const sectionTop = current.offsetTop - 100;
                    const sectionId = current.getAttribute('id');
                    
                    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                        const navLink = document.querySelector('.navbar .nav-item a[href*=' + sectionId + ']');
                        if (navLink) {
                            navLink.parentElement.classList.add('active');
                        }
                    } else {
                        const navLink = document.querySelector('.navbar .nav-item a[href*=' + sectionId + ']');
                        if (navLink) {
                            navLink.parentElement.classList.remove('active');
                        }
                    }
                });
            }
            
            window.addEventListener('scroll', navHighlighter);
            navHighlighter();
        }
    });
</script>