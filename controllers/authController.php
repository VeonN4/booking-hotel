<?php
include dirname(__DIR__) . "/models/user.php";


switch ($_GET['action'] ?? null) {
    case 'signin':
        session_start();
        $email = htmlspecialchars($_POST['full_name']) ?? null;
        $password = htmlspecialchars($_POST['full_name']) ?? null;

        if ($email === null) {
            header("Location: " . dirname(__DIR__) . "index.php");
            break;
        }

        if ($password === null) {
            header("Location: " . dirname(__DIR__) . "index.php");
            break;
        }

        $user = getUserByEmail($email)->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: " . dirname(__DIR__) . "index.php");
            exit;
        }

        break;

    case 'signup':
        $full_name = htmlspecialchars($_POST['full_name']) ?? null;
        $email = htmlspecialchars($_POST['email']) ?? null;
        $password = htmlspecialchars($_POST['password']) ?? null;
        $phone = htmlspecialchars($_POST['phone']) ?? null;

        if ($full_name === null) {
            header("Location: " . dirname(__DIR__) . "index.php");
            break;
        }

        if ($email === null) {
            header("Location: " . dirname(__DIR__) . "index.php");
            break;
        }

        if ($password === null) {
            header("Location: " . dirname(__DIR__) . "index.php");
            break;
        }

        if ($phone === null) {
            header("Location: " . dirname(__DIR__) . "index.php");
            break;
        }

        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        createUser("1" , $full_name, $email, $password, $phone);

        header("location: login.php");
        exit;

        break;
}
