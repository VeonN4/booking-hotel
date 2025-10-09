<!-- Navigation -->
<nav>
    <div class="nav-container">
        <div class="logo">
            <a href="index.php" style="text-decoration: none;" class="color-accent">
                Bookly
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php#about">About</a></li>
            <li><a href="index.php#destinations">Destinations</a></li>
            <li><a href="index.php#contact">Contact</a></li>
            <li><a href="hotels.php">Hotels</a></li>
            <?php if (!empty($_SESSION)): ?>            
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php endif ?>
        </ul>
    </div>
</nav>