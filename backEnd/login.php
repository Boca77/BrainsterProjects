<?php
session_start();

include("./Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$username = $_POST['username'];
$password = $_POST['password'];


$stmt = $connection->prepare('SELECT `username`, `password` FROM `users` WHERE `username` = :username');
$stmt->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $passwordDB = $user['password'];
    if (password_verify($password, $passwordDB)) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['isLoggedIn'] = true;

        header("location: ../index.php");
        return;
    } else {

        header("location: ../login-signup.php?errorLogin=Invalid%20password");
        return;
    }
} else {

    header("location: ../login-signup.php?errorLogin=Username%20not%20found");
    return;
}
