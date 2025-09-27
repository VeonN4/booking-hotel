<?php
include "controllers/hotelsController.php";

if (empty($id)) {
    header("Location: hotels.php");
}

if (empty($hotel_data)) {
    header("Location: hotels.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card">
        <p><?= $hotel_data['name'] ?></p>
        <p><?= $hotel_data['description'] ?></p>
        <p><?= $hotel_data['address'] ?></p>
        <p><?= $hotel_data['city'] ?></p>
        <p><?= $hotel_data['country'] ?></p>
        <p><?= $hotel_data['rating'] ?></p>
    </div>
</body>

</html>