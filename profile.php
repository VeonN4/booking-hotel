<?php
session_start();

include_once "utils/render_view.php";
include_once "models/bookings.php";
include_once "models/rooms.php";

$id = $_SESSION['user_id'];

$booking_data = getBookingByUserId($id);
$room_data = getRoomById($booking_data->fetch_assoc()['room_id']);

view("layouts/header");
view("layouts/nav");
?>


<section class="section">
    <div class="section-container">
        <div class="card-static">
            <div class="card-info">

                <h3 class="text-display-s font-bold my-4 color-accent">Booking Room</h3>

                <table border="">
                    <thead>

                    </thead>
                    <th>Room</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Status</th>
                    <th>Total Price</th>
                    <tbody>
                        <?php foreach ($booking_data as $key => $value) : ?>
                            <tr>
                                <td><?= getRoomById($value['room_id'])->fetch_assoc()['room_number'] ?></td>
                                <td><?= $value['check_in'] ?></td>
                                <td><?= $value['check_out'] ?></td>
                                <td><?= $value['status'] ?></td>
                                <td><?= $value['total_price'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>