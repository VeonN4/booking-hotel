<?php
session_start();
include_once dirname(__DIR__) . "/utils/permission_check.php";
include_once dirname(__DIR__) . "/models/user.php";

switch ($_GET['action'] ?? null) {
    case 'signin':
        $email = htmlspecialchars($_POST['email']) ?? null;
        $password = htmlspecialchars($_POST['password']) ?? null;

        if ($email === null) {
            header("Location: index.php");
            break;
        }

        if ($password === null) {
            header("Location: index.php");
            break;
        }

        $user = getUserByEmail($email)->fetch_assoc() ?? null;

        if ($user === NULL) {
            header("Location: index.php");
        }


        if (password_verify($password, $user['password'])) {
            // session_regenerate_id(true);
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: index.php");
            exit;
        }

        break;

    case 'signup':
        $full_name = htmlspecialchars($_POST['full_name']) ?? null;
        $email = htmlspecialchars($_POST['email']) ?? null;
        $password = htmlspecialchars($_POST['password']) ?? null;
        $phone = htmlspecialchars($_POST['phone']) ?? null;

        if ($full_name === null) {
            header("Location: index.php");
            break;
        }

        if ($email === null) {
            header("Location: index.php");
            break;
        }

        if ($password === null) {
            header("Location: index.php");
            break;
        }

        if ($phone === null) {
            header("Location: index.php");
            break;
        }

        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        createUser("1", $full_name, $email, $hash_password, $phone);

        header("location: login.php");
        exit;

        break;
    case 'logout':
        session_destroy();
        session_unset();
        
        header("location: index.php");

        exit;
}

if (isLoggedIn()) {
    header("Location: index.php");
}