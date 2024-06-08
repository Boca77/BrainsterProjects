<?php

session_start();

include("./Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$fetchUsernames = $connection->prepare('SELECT `username` FROM `users`');
$fetchUsernames->execute();
$allUsers = $fetchUsernames->fetchAll(PDO::FETCH_ASSOC);

$user = [
    'username' => $_POST['username'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
];

foreach ($allUsers as $username) {
    if ($_POST['username'] === $username['username']) {
        header("location: ../login-signup.php?errorSignUp=Username%20already%20exists");
        return;
    }
}

$insertUserQuery = "INSERT INTO `users` (`username`, `password`) VALUES (:username, :password)";
$insertUser = $connection->prepare($insertUserQuery);
$insertUser->execute($user);

$db->destroyConnection();

$_SESSION['user'] = $user['username'];
$_SESSION['isLoggedIn'] = true;

header("location: ../index.php");
