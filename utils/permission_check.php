<?php
function isRole($role) {
    if (!$_SESSION['role_id'] === $role) {
        view("error/404");
        exit;
        return false;
    }

    return true;
}

function isLoggedIn() {
    if (isset($_SESSION)) {
        header("Location: index.php");
        return false;
    }
    return true;
}