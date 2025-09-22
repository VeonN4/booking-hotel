<?php
include dirname(__DIR__) . "/models/user.php";

session_start();

switch ($_GET['action'] ?? null) {
    case 'signin':
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($email === null) {
            header("Location: ../index.php");
            break;
        }

        if ($password === null) {
            header("Location: ../index.php");
            break;
        }

        $user = getUserByEmail($email)->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: ../index.php");
        }

        break;
}
