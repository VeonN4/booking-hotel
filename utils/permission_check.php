<?php
function isRole($role) {
    if (!$_SESSION['role_id'] === $role) {
        view("error/404");
        return false;
        exit;
    }

    return true;
}

function isLoggedIn() {
    if (!empty($_SESSION)) {
        return true;
    }
    return false;
}