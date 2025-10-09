<!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <a href="#privacy" class="footer-link">Privacy</a>
            <a href="#terms" class="footer-link">Terms</a>
            <a href="#help" class="footer-link">Help</a>
        </div>
        <div class="copyright">
            © 2025 Bookly. Crafted with intention.
        </div>
    </div>
</footer>

<script>
    // Smooth navbar background on scroll
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('nav');
        if (window.scrollY > 50) {
            nav.style.boxShadow = '0 2px 20px rgba(212, 165, 116, 0.1)';
        } else {
            nav.style.boxShadow = 'none';
        }
    });

    // Add subtle parallax effect to floating elements
    window.addEventListener('mousemove', (e) => {
        const floatingElements = document.querySelectorAll('.floating-element');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;

        floatingElements.forEach((el, index) => {
            const speed = (index + 1) * 20;
            el.style.transform = `translate(${x * speed}px, ${y * speed}px)`;
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#login') {
                // Handle login button separately
                alert('Login/Register modal would open here');
                return;
            }
            const target = document.querySelector(targetId);
            if (target) {
                const offsetTop = target.offsetTop - 80; // Account for fixed navbar
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Observe all sections
    document.querySelectorAll('.section').forEach(section => {
        observer.observe(section);
    });

    // Form submission handler
    document.querySelector('.contact-form form').addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Thank you for your message! We will get back to you soon.');
        e.target.reset();
    });
</script>
</body>

</html>