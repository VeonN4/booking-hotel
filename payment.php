<?php
session_start();

require_once "controllers/paymentController.php";
require_once "controllers/roomsController.php";
require_once "utils/permission_check.php";
require_once "utils/render_view.php";

if (!isLoggedIn()) {
    view("error/create_account_first");
    exit;
}

if (empty($id)) {
    header("Location: hotels.php");
}

if (empty($_GET['method'])) {
    header("Location: hotels.php");
}

if (empty($room_data)) {
    header("Location: hotels.php");
}

$data = $room_data->fetch_assoc();

view("layouts/header");
view("layouts/nav");
?>

<section class="section">
    <div class="section-container">
        <div class="mb-12">
            <h1 class="font-bold text-display-l text-align-center color-accent">Payment Details</h1>
            <p class="text-align-center text-sub-1 color-text-light">Secure your perfect retreat</p>
        </div>
        <div class="card-grid">
            <div class="card-static">
                <div class="booking-summary">
                    <div class="card-info">
                        <h3 class="text-display-xs font-bold color-accent">Booking Summary</h3>
                    </div>
                    <div class="card-info">
                        <div class="summary-row my-4">
                            <span class="text-body-1 color-text"><?= $data['room_number'] ?></span>
                            <span class="text-caption color-text-light">$<?= $data['price'] ?>/night</span>
                        </div>
                        <hr class="color-accent">
                        <div class="summary-row total my-4 text-display-tiny font-bold">
                            <span class="color-text color-text-light">Total</span
                                <span class="text-caption">$<?= $data['price'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-static">
                <form id="paymentForm" method="post" action="?action=reserve">
                    <div class="card-info">
                        <input type="hidden" id="id" name="id" value="<?= $_GET['id'] ?>">
                        <h3 class="text-display-xs font-bold color-accent mb-4">Personal Information</h3>
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" name="fullName" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="card-info">
                        <h3 class="text-display-xs font-bold color-accent mb-4">Payment Information</h3>
                        <div class="form-group">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" required>
                        </div>
                        <div class="card-row">
                            <div class="form-group">
                                <label for="expiry">Expiry Date</label>
                                <input type="text" id="expiry" name="expiry" placeholder="MM/YY" maxlength="5" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="123" maxlength="3" required>
                            </div>
                        </div>

                        <div class="checkbox-group my-4">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I agree to the terms and conditions</label>
                        </div>

                        <button type="submit" class="cta-button">Complete Booking</button>
                        <p class="secure-note mt-4">Your payment information is encrypted and secure</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
view("layouts/footer");
?>