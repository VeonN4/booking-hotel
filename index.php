<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookly</title>
  <link rel="stylesheet" href="css/bookly-app.css">
</head>

<body>
  <!-- Navigation -->
  <nav>
    <div class="nav-container">
      <div class="logo">Brookly</div>
      <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#destinations">Destinations</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    <div class="hero-container fadeInUp">
      <h1 class="brand-name"><?= htmlspecialchars($_SESSION['full_name'] ?? "Brookly") ?></h1>
      <p class="tagline fadeIn-05">Thoughtful stays, seamless booking</p>
      <a href="register.php" class="cta-button fadeIn-08">Begin Your Journey</a>
    </div>

  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-section">
        <a href="#privacy" class="footer-link">Privacy</a>
        <a href="#terms" class="footer-link">Terms</a>
        <a href="#help" class="footer-link">Help</a>
      </div>
      <div class="copyright">
        © 2025 Brookly. Crafted with intention.
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
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
</body>

</html>