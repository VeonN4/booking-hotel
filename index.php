<?php
include_once "utils/render_view.php";

view('layouts/header');
view('layouts/nav');
?>

<!-- Main Content -->
<main>
  <div class="floating-element one"></div>
  <div class="floating-element two"></div>

  <div class="hero-container">
    <h1 class="brand-name">Bookly</h1>
    <p class="tagline">Thoughtful stays, seamless booking</p>
    <a href="#login" class="cta-button">Begin Your Journey</a>
  </div>

  <div class="scroll-indicator"></div>
</main>

<!-- About Section -->
<section id="about" class="section about-section">
  <div class="section-container">
    <div class="about-content">
      <div class="about-text">
        <h2 class="section-title">About Bookly</h2>
        <p class="section-description">
          We believe in creating moments of tranquility in your travels. Every stay should be more than just a room—it should be an experience that rejuvenates your spirit.
        </p>
        <p class="section-paragraph">
          Founded on principles of mindful hospitality, Bookly connects thoughtful travelers with carefully curated accommodations that prioritize comfort, authenticity, and sustainable practices.
        </p>
        <div class="features-grid">
          <div class="feature-item">
            <span class="feature-number">500+</span>
            <span class="feature-label">Curated Properties</span>
          </div>
          <div class="feature-item">
            <span class="feature-number">50+</span>
            <span class="feature-label">Countries</span>
          </div>
          <div class="feature-item">
            <span class="feature-number">100k+</span>
            <span class="feature-label">Happy Travelers</span>
          </div>
        </div>
      </div>
      <div class="about-visual">
        <div class="visual-card card-1">Mindful</div>
        <div class="visual-card card-2">Curated</div>
        <div class="visual-card card-3">Sustainable</div>
      </div>
    </div>
  </div>
</section>

<!-- Destinations Section -->
<section id="destinations" class="section destinations-section">
  <div class="section-container">
    <h2 class="section-title centered">Featured Destinations</h2>
    <p class="section-subtitle">Discover spaces that inspire and restore</p>
    <div class="destinations-grid">
      <div class="destination-card">
        <div class="destination-image">
          <span class="destination-name">Kyoto</span>
        </div>
        <div class="destination-info">
          <p>Traditional ryokans and modern comfort</p>
        </div>
      </div>
      <div class="destination-card">
        <div class="destination-image">
          <span class="destination-name">Santorini</span>
        </div>
        <div class="destination-info">
          <p>Cliffside retreats with endless views</p>
        </div>
      </div>
      <div class="destination-card">
        <div class="destination-image">
          <span class="destination-name">Bali</span>
        </div>
        <div class="destination-info">
          <p>Jungle villas and beachfront serenity</p>
        </div>
      </div>
      <div class="destination-card">
        <div class="destination-image">
          <span class="destination-name">Tuscany</span>
        </div>
        <div class="destination-info">
          <p>Rustic farmhouses in rolling hills</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section contact-section">
  <div class="section-container">
    <div class="contact-content">
      <div class="contact-info">
        <h2 class="section-title">Get in Touch</h2>
        <p class="section-description">
          Have questions about your next stay? We're here to help you find the perfect retreat.
        </p>
        <div class="contact-methods">
          <div class="contact-item">
            <span class="contact-icon">✉</span>
            <div>
              <h4>Email</h4>
              <p>support@bookly.com</p>
            </div>
          </div>
          <div class="contact-item">
            <span class="contact-icon">☎</span>
            <div>
              <h4>Phone</h4>
              <p>+1 (555) 123-4567</p>
            </div>
          </div>
          <div class="contact-item">
            <span class="contact-icon">⌚</span>
            <div>
              <h4>Hours</h4>
              <p>24/7 Support Available</p>
            </div>
          </div>
        </div>
      </div>
      <div class="contact-form">
        <form>
          <div class="form-group">
            <input type="text" placeholder="Your Name" class="form-input">
          </div>
          <div class="form-group">
            <input type="email" placeholder="Your Email" class="form-input">
          </div>
          <div class="form-group">
            <textarea placeholder="Your Message" rows="5" class="form-input"></textarea>
          </div>
          <button type="submit" class="cta-button">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php
view('layouts/footer');
?>