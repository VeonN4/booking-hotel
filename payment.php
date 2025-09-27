<?php
require_once "utils/render_view.php";
require_once "utils/permission_check.php";

require_once "controllers/roomsController.php";
require_once "controllers/paymentController.php";

// if (!isLoggedIn()) {
//     view("error/create_account_first");
//     exit;
// }

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Reserving for room <?= $data['room_number'] ?></h1>

    <form action="<?= $_SERVER['REQUEST_URI'] . "&action=reserve" ?>" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone">
        </div>
        <button type="submit">Confirm Payment</button>
    </form>

    <h1>Price: <?= $data['price'] ?></h1>
</body>

</html>