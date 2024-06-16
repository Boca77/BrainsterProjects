<?php
session_start();

include("./Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$username = $_POST['username'];
$password = $_POST['password'];

$getUser = $connection->prepare('SELECT `username`, `password` FROM `users` WHERE `username` = :username');
$getUser->bindParam(':username', $username);
$getUser->execute();
$user = $getUser->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $passwordDB = $user['password'];

    if (password_verify($password, $passwordDB)) {
        if ($user['username'] == 'admin') {
            $_SESSION['isAdmin'] = true;
        }

        $_SESSION['user'] = $user['username'];
        $_SESSION['isLoggedIn'] = true;

        header("location: ../index.php");
        return;
    }

    header("location: ../login-signup.php?errorLogin=Invalid%20password");
    return;
}

header("location: ../login-signup.php?errorLogin=Username%20not%20found");
