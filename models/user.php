<?php
include "./services/db.php";

function createUser($role_id, $full_name, $email, $password, $phone) {
    $db = getDBConnection();
    $query = "INSERT INTO users(role_id, full_name, email, password, phone) VALUES (?, ?, ?, ?, ?)";

    $stmt = $db->prepare($query);
    $stmt->bind_param("sssss", $role_id, $full_name, $email, $password, $phone);
    return $stmt->execute();
}

function getAllUser() {
    $db = getDBConnection();
    $query = "SELECT * FROM users";

    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getUserById($user_id) {
    $db = getDBConnection();
    $query = "SELECT * FROM users WHERE id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    return $stmt->get_result();
}

function updateUserById($user_id, $role_id, $full_name, $email, $password, $phone) {
    $db = getDBConnection();
    $query = "UPDATE siswa SET role_id = ?, full_name = ?, email = ?, password = ?, phone = ? WHERE id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssss", $role_id, $full_name, $email, $password, $phone, $user_id);
    return $stmt->execute();
}

function deleteUserById($user_id) {
    $db = getDBConnection();
    $query = "DELETE FROM users WHERE id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    return $stmt->get_result();
}