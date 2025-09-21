<?php
include "./services/db.php";

function createBooking($user_id, $room_id, $check_in, $check_out, $status, $total_price)
{
    $db = getDBConnection();
    $query = "INSERT INTO bookings(user_id, room_id, check_in, check_out, status, total_price) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssss", $user_id, $room_id, $check_in, $check_out, $status, $total_price);
    return $stmt->execute();
}

function getAllBooking()
{
    $db = getDBConnection();
    $query = "SELECT * FROM bookings";

    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getBookingById($booking_id)
{
    $db = getDBConnection();
    $query = "SELECT * FROM bookings WHERE booking_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $booking_id);
    $stmt->execute();
    return $stmt->get_result();
}

function updateBookingById($booking_id, $user_id, $room_id, $check_in, $check_out, $status, $total_price)
{
    $db = getDBConnection();
    $query = "UPDATE bookings SET user_id = ?, room_Id = ?, check_in = ?, check_out = ?, status = ?, total_price = ? WHERE booking_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("sssssss", $user_id, $room_id, $check_in, $check_out, $status, $total_price, $booking_id);
    return $stmt->execute();
}

function deleteBookingById($booking_id)
{
    $db = getDBConnection();
    $query = "DELETE FROM bookings WHERE booking_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $booking_id);
    $stmt->execute();
    return $stmt->get_result();
}
