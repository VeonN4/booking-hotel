<?php
include "./services/db.php";

function createRoom($hotel_id, $room_number, $type, $price, $capacity, $status)
{
    $db = getDBConnection();
    $query = "INSERT INTO rooms(hotel_id, room_number, type, price, capacity, status) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssss", $hotel_id, $room_number, $type, $price, $capacity, $status);
    return $stmt->execute();
}

function getAllRooms()
{
    $db = getDBConnection();
    $query = "SELECT * FROM rooms";

    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getRoomById($room_id)
{
    $db = getDBConnection();
    $query = "SELECT * FROM rooms WHERE room_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $room_id);
    $stmt->execute();
    return $stmt->get_result();
}

function getRoomByHotelId($hotel_id)
{
    $db = getDBConnection();
    $query = "SELECT * FROM rooms WHERE hotel_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $hotel_id);
    $stmt->execute();
    return $stmt->get_result();
}

function updateRoomById($room_id, $hotel_id, $room_number, $type, $price, $capacity, $status)
{
    $db = getDBConnection();
    $query = "UPDATE rooms SET hotel_id = ?, room_number = ?, type = ?, price = ?, capacity = ?, status = ? WHERE room_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("sssssss", $hotel_id, $room_number, $type, $price, $capacity, $status, $room_id);
    return $stmt->execute();
}

function deleteRoomById($room_id)
{
    $db = getDBConnection();
    $query = "DELETE FROM rooms WHERE room_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $room_id);
    $stmt->execute();
    return $stmt->get_result();
}
