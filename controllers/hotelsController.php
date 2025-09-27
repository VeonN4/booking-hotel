<?php
require_once dirname(__DIR__) . "/models/hotels.php";

$action = $_GET['action'] ?? null;
$id = $_GET['id'] ?? null;

if (isset($id)) {
    $hotel_data = getHotelById($id)->fetch_assoc();
}

switch ($action) {
    case 'listHotel':
        $hotel_data = getAllHotels();

        break;
}
