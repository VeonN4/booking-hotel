<?php
include "./services/db.php";

function createRole($role_name)
{
    $db = getDBConnection();
    $query = "INSERT INTO roles(role_name) VALUES (?)";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $role_name);
    return $stmt->execute();
}

function getAllRole()
{
    $db = getDBConnection();
    $query = "SELECT * FROM roles";

    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getRoleById($role_id)
{
    $db = getDBConnection();
    $query = "SELECT * FROM roles WHERE role_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $role_id);
    $stmt->execute();
    return $stmt->get_result();
}

function updateRoleById($role_id, $role_name)
{
    $db = getDBConnection();
    $query = "UPDATE roles SET role_name = ? WHERE role_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $role_name, $role_id);
    return $stmt->execute();
}

function deleteRoleById($role_id)
{
    $db = getDBConnection();
    $query = "DELETE FROM roles WHERE role_id = ?";

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $role_id);
    $stmt->execute();
    return $stmt->get_result();
}
