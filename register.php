<?php

include_once dirname(__FILE__) . "/utils/render_view.php";
include_once dirname(__FILE__) . "/utils/permission_check.php";
include_once dirname(__FILE__) . "/controllers/authController.php";

view("layouts/header");

?>


<section id="forms" class="section">
    <div class="section-container" style="width: 30rem;">

        <form action="?action=signup" method="post">
            <div class="card-static">
                <div class="card-info">
                    <h1 class="section-title color-accent">Sign-up</h1>

                    <div class="subsection">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="full_name">Full Name</label>
                                <input type="text" class="form-input" id="full_name" name="full_name" placeholder="Enter your full name">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-input" id="email" name="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-input" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tel" class="form-input" id="phone" name="phone" placeholder="Enter your phone number">
                            </div>
                            <div class="my-4"><a href="login.php">Already have an account?</a></div>
                            <button class="cta-button" type="submit" name="submit" value="signup">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>