<?php
require_once dirname(__DIR__) . "/models/rooms.php";

$id = $_GET['id'] ?? null;

if ($id) {
    $room_data = getRoomByHotelId($id);
}
