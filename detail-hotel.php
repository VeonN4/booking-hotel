<?php
session_start();
require_once "controllers/hotelsController.php";
require_once "controllers/roomsController.php";
require_once "utils/render_view.php";

if (empty($id)) {
    header("Location: hotels.php");
}

if (empty($_GET['method'])) {
    header("Location: hotels.php");
}

if (empty($hotel_data)) {
    header("Location: hotels.php");
}

view('layouts/header');
view('layouts/nav');
?>
<section class="section">

    <!-- Hotel Hero Section -->
    <div class="hotel-hero">
        <div class="hero-image">
            <!-- Image placeholder - in production, use actual hotel image -->
            <div class="hotel-badge">
                <span class="rating-stars">★★★★★</span>
                <span class="rating-number"><?= number_format($hotel_data['rating'], 1) ?></span>
            </div>
        </div>

        <div class="hotel-info">
            <div class="hotel-header">
                <h1 class="hotel-name font-bold"><?= htmlspecialchars($hotel_data['name']) ?></h1>
                <div class="hotel-location">
                    <span class="location-icon">📍</span>
                    <span><?= htmlspecialchars($hotel_data['address']) ?>, <?= htmlspecialchars($hotel_data['city']) ?>, <?= htmlspecialchars($hotel_data['country']) ?></span>
                </div>
                <p class="hotel-description">
                    <?= htmlspecialchars($hotel_data['description']) ?>
                </p>
            </div>

            <!-- Hotel Features -->
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🏊</div>
                    <span class="feature-text">Swimming Pool</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🍽️</div>
                    <span class="feature-text">Restaurant</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🌐</div>
                    <span class="feature-text">Free WiFi</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🚗</div>
                    <span class="feature-text">Free Parking</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">💪</div>
                    <span class="feature-text">Fitness Center</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">💼</div>
                    <span class="feature-text">Business Center</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Rooms Section -->
    <div class="rooms-section">
        <div class="section-header">
            <h2 class="section-title">Available Rooms</h2>
            <div class="filter-buttons">
                <button class="filter-btn active">All Rooms</button>
                <button class="filter-btn">Available</button>
                <button class="filter-btn">Suite</button>
                <button class="filter-btn">Deluxe</button>
            </div>
        </div>

        <div class="rooms-grid">
            <?php foreach ($room_data as $room): ?>
                <div class="room-card">
                    <div class="room-image">
                        <span class="room-status <?= $room['status'] === 'available' ? 'status-available' : 'status-occupied' ?>">
                            <?= ucfirst($room['status']) ?>
                        </span>
                    </div>

                    <div class="room-details">
                        <div class="room-header">
                            <h3 class="room-type"><?= htmlspecialchars($room['type']) ?></h3>
                            <span class="room-number">Room <?= htmlspecialchars($room['room_number']) ?></span>
                        </div>

                        <div class="room-price">
                            $<?= number_format($room['price'], 0) ?><span class="price-period">/night</span>
                        </div>

                        <div class="room-features">
                            <div class="room-feature">
                                <span class="feature-icon-small">👥</span>
                                <span><?= $room['capacity'] ?> Guests</span>
                            </div>
                            <div class="room-feature">
                                <span class="feature-icon-small">🛏️</span>
                                <span>King Bed</span>
                            </div>
                            <div class="room-feature">
                                <span class="feature-icon-small">🌊</span>
                                <span>Ocean View</span>
                            </div>
                        </div>

                        <div class="room-action">
                            <?php if ($room['status'] === 'available'): ?>
                                <a href="payment.php?method=room&id=<?= $room['room_id'] ?>" class="btn-reserve">
                                    Reserve Now
                                </a>
                            <?php else: ?>
                                <a href="#" class="btn-reserve disabled" onclick="return false;">
                                    Not Available
                                </a>
                            <?php endif; ?>
                            <a href="room-details.php?id=<?= $room['room_id'] ?>" class="btn-details">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            // Here you would implement actual filtering logic
            // For now, it's just visual feedback
        });
    });

    // Smooth scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe room cards for animation
    document.querySelectorAll('.room-card').forEach(card => {
        observer.observe(card);
    });
</script>