<?php
require_once dirname(__DIR__) . "/services/db.php";

function createHotel($name, $description, $address, $city, $country, $rating)
{
    $db = getDBConnection();
    $query = "INSERT INTO hotels(name, description, address, city, country, rating) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssss", $name, $description, $address, $city, $country, $rating);
    return $stmt->execute();
}

function getAllHotels()
{
    $db = getDBConnection();
    $query = "SELECT * FROM hotels";

    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getHotelById($hotel_id)
{
    $db = getDBConnection();
    $query = "SELECT * FROM hotels WHERE hotel_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $hotel_id);
    $stmt->execute();
    return $stmt->get_result();
}

function updateHotelById($hotel_id, $name, $description, $address, $city, $country, $rating)
{
    $db = getDBConnection();
    $query = "UPDATE hotels SET name = ?, description = ?, address = ?, city = ?, country = ?, rating = ? WHERE hotel_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("sssssss", $name, $description, $address, $city, $country, $rating, $hotel_id);
    return $stmt->execute();
}

function deleteHotelById($hotel_id)
{
    $db = getDBConnection();
    $query = "DELETE FROM hotels WHERE hotel_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $hotel_id);
    $stmt->execute();
    return $stmt->get_result();
}
