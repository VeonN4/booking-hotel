<?php
require_once "controllers/hotelsController.php";
require_once "controllers/roomsController.php";

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

    <h1>Available Rooms:</h1>

    <table border="1">
        <thead>
            <th>Room Number</th>
            <th>Type</th>
            <th>Price</th>
            <th>Capacity</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($room_data as $key => $value): ?>
                <tr>
                    <td><?= $value['room_number'] ?></td>
                    <td><?= $value['type'] ?></td>
                    <td><?= $value['price'] ?></td>
                    <td><?= $value['capacity'] ?></td>
                    <td><?= $value['status'] ?></td>
                    <td>
                        <a href="payment.php?id=<?= $value['room_id'] ?>">Reserve</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>