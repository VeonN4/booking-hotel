<?php
require_once dirname(__DIR__) . "/services/db.php";

function createUser($role_id, $full_name, $email, $password, $phone)
{
    $db = getDBConnection();
    $query = "INSERT INTO users(role_id, full_name, email, password, phone) VALUES (?, ?, ?, ?, ?)";

    $stmt = $db->prepare($query);
    $stmt->bind_param("sssss", $role_id, $full_name, $email, $password, $phone);
    return $stmt->execute();
}

function addUserBalance($user_id, $balance)
{
    if ($balance < 0) {
        return 0;
    }

    $db = getDBConnection();
    $query = "UPDATE users SET balance = balance + ? WHERE user_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("is", $balance, $user_id);
    return $stmt->execute();
}

function removeUserBalance($user_id, $balance)
{
    if ($balance < 0) {
        return 0;
    }

    $db = getDBConnection();
    $query = "UPDATE users SET balance = balance - ? WHERE user_id = ? AND balance >= ?;";

    $stmt = $db->prepare($query);
    $stmt->bind_param("isi", $balance, $user_id, $balance);
    return $stmt->execute();
}

function getAllUser()
{
    $db = getDBConnection();
    $query = "SELECT * FROM users";

    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getUserByEmail($email)
{
    $db = getDBConnection();
    $query = "SELECT * FROM users WHERE email = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    return $stmt->get_result();
}

function getUserById($user_id)
{
    $db = getDBConnection();
    $query = "SELECT * FROM users WHERE user_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    return $stmt->get_result();
}

function updateUserById($user_id, $role_id, $full_name, $email, $password, $phone)
{
    $db = getDBConnection();
    $query = "UPDATE users SET role_id = ?, full_name = ?, email = ?, password = ?, phone = ? WHERE user_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssss", $role_id, $full_name, $email, $password, $phone, $user_id);
    return $stmt->execute();
}

function deleteUserById($user_id)
{
    $db = getDBConnection();
    $query = "DELETE FROM users WHERE user_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    return $stmt->get_result();
}
