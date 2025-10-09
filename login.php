<?php
include_once dirname(__FILE__) . "/utils/permission_check.php";
include_once dirname(__FILE__) . "/utils/render_view.php";
include_once dirname(__FILE__) . "/controllers/authController.php";

view("layouts/header");
?>

<section id="forms" class="section">
    <div class="section-container" style="width: 30rem;">

        <form action="?action=signin" method="post">
            <div class="card-static">
                <div class="card-info">
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
                            <button class="cta-button" type="submit" name="submit" value="signin">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>