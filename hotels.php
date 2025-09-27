<?php
require_once "controllers/hotelsController.php";


if ($action !== "listHotel") {
    header("Location: ?action=listHotel");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a {
            margin: 5px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }

        .card {
            display: flex;
            align-items: center;
            border: 1px solid #000;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div class="grid">
        <?php foreach ($hotel_data as $key => $value): ?>
            <div class="card">
                <p><?= $value['name'] ?></p>
                <a href="<?= 'detail-hotel.php?id=' . $value['hotel_id'] ?>">Open</a>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>