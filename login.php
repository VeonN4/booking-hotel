<?php
include dirname(__FILE__) . "/controllers/authController.php";
include dirname(__FILE__) . "/utils/permission_check.php";

if (isLoggedIn()) {
    header("Location: index.php");
    exit;
}
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
    <!-- Main Content -->
    <main>
        <section id="forms" class="section">
            <form action="?action=signin" method="post">

                <h1 class="section-title">Sign-in</h1>

                <div class="subsection">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-input" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-input" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" name="submit" value="signin">Submit</button>
                    </div>
                </div>
            </form>
        </section>
    </main>

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