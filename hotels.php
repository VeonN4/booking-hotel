<?php
session_start();

require_once "controllers/hotelsController.php";
require_once "utils/render_view.php";


if ($action !== "listHotel") {
    header("Location: ?action=listHotel");
    exit;
}

view("layouts/header");
view("layouts/nav");
?>

<section class="section">
    <div class="card-grid hotels-card-grid">
        <?php foreach ($hotel_data as $key => $value): ?>
            <div class="card">
                <div class="card-image">
                    <span class="card-name text-display-s font-bold"><?= $value['name'] ?></span>
                </div>
                <div class="display-flex justify-space-between card-info">
                    <span class="card-name text-display-s font-bold"><?= $value['name'] ?></span>
                    <span class="card-name text-sub-1 align-center font-bold color-secondary"><?= $value['rating'] ?></span>
                </div>
                <div class="card-info">
                    <p><?= $value['description'] ?></p>
                </div>
                <div class="card-info">
                    <div class="location">
                        <p><?= $value['country'] ?></p>
                        <p><?= $value['city'] ?></p>
                        <p><?= $value['address'] ?></p>
                    </div>
                    <br>
                    <a href="<?= 'detail-hotel.php?method=hotel&id=' . $value['hotel_id'] ?>" class="cta-button">Open</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>

<?php
view("layouts/footer");
?>