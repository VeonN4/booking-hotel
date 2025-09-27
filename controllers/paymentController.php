<?php
require_once dirname(__DIR__) . "/models/rooms.php";

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'reserve':
        $id = htmlspecialchars($_POST['id']);
        $raw_data = getRoomById($id);
        $room_data = $raw_data->fetch_assoc();

        try {
            updateRoomById($id, $room_data['hotel_id'], $room_data['room_number'], $room_data['type'], $room_data['price'], $room_data['capacity'], 'booked');
            $status = ['purchased' => true];
        } catch (\Throwable $th) {
            $status = ['purchased' => false];
        }

        break;
}

if (isset($status['purchased']) && $status['purchased'] === true) {
    view('thanks_msg');
    exit;
}

if (isset($status['purchased']) && $status['purchased'] === false) {
    view('thanks_msg');
    exit;
}
