<?php
require_once dirname(__DIR__) . "/models/rooms.php";
require_once dirname(__DIR__) . "/models/user.php";

session_start();

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'reserve':
        $id = htmlspecialchars($_POST['id']);

        $raw_data = getRoomById($id);
        $room_data = $raw_data->fetch_assoc();

        $user_data = getUserById($_SESSION['user_id'])->fetch_assoc();

        try {
            if (!removeUserBalance($_SESSION['user_id'], $room_data['price'])) {
                throw new Exception("Error Processing Request", 1);
            }

            updateRoomById($id, $room_data['hotel_id'], $room_data['room_number'], $room_data['type'], $room_data['price'], $room_data['capacity'], 'booked');
            $status = ['purchased' => true];
        } catch (\Throwable $th) {
            $status = ['purchased' => false];
            break;
            exit;
        }

        break;
}

if (isset($status['purchased']) && $status['purchased'] === true) {
    view('thanks_msg');
    exit;
}

if (isset($status['purchased']) && $status['purchased'] === false) {
    view('error/something_went_wrong');
    exit;
}
