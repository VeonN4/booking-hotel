<?php
require_once dirname(__DIR__) . "/models/rooms.php";

$method = $_GET['method'] ?? null;
$id = $_GET['id'] ?? null;

switch ($method) {
    case 'hotel':
        $room_data = getRoomByHotelId($id);
        break;

    case 'room':
        $room_data = getRoomById($id);
        break;
}
