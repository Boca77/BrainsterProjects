<?php

session_start();

include("./Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$email = $_POST['email'];
$password = $_POST['password'];

$fetchEmail = $connection->prepare('SELECT `email` FROM `users` WHERE email = :email');
$fetchEmail->bindParam("email", $email);
$fetchEmail->execute();
$user = $fetchEmail->fetch(PDO::FETCH_ASSOC);

if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/', $password)) {
    header("location: ../login-signup.php?errorSignUp=Please%20enter%20valid%20email");
    return;
}

$user = [
    'email' => $_POST['email'],
    'password' => password_hash($password, PASSWORD_DEFAULT),
];

if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
    header("location: ../login-signup.php?errorSignUp=Please%20enter%20valid%20email");
    return;
}

if ($user) {
    header("location: ../login-signup.php?errorSignUp=Email%20already%20exists");
    return;
}


$insertUserQuery = "INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)";
$insertUser = $connection->prepare($insertUserQuery);
$insertUser->execute($user);

$db->destroyConnection();

$_SESSION['user'] = $user['email'];
$_SESSION['isLoggedIn'] = true;

header("location: ../index.php");
