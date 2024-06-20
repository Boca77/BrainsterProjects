<?php

session_start();

include("./Connection.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header("location: ../login-signup.php?errorSignUp=Error%20try%20again");
    return;
}

if ($_POST['email'] == '' || $_POST['password'] == '') {
    header("location: ../login-signup.php?errorSignUp=Please%20enter%20both%20inputs");
    return;
}

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$email = $_POST['email'];
$password = $_POST['password'];

if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
    header("location: ../login-signup.php?errorSignUp=Please%20enter%20valid%20email");
    return;
}

if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/', $password)) {
    header("location: ../login-signup.php?errorSignUp=Please%20enter%20valid%20password");
    return;
}

$fetchEmail = $connection->prepare('SELECT `email` FROM `users` WHERE email = :email');
$fetchEmail->bindParam(":email", $email);
$fetchEmail->execute();
$userExists = $fetchEmail->fetch(PDO::FETCH_ASSOC);

if ($userExists) {
    header("location: ../login-signup.php?errorSignUp=Email%20already%20exists");
    return;
}

$user = [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT),
];

$insertUserQuery = "INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)";
$insertUser = $connection->prepare($insertUserQuery);
$insertUser->execute($user);

$db->destroyConnection();

$getId = $connection->prepare("SELECT `id` FROM `users` WHERE email = :email");
$getId->bindParam('email', $user['email']);
$getId->execute();
$newUserId = $getId->fetch();

$_SESSION['user'] = $user['email'];
$_SESSION['userID'] = $newUserId['id'];
$_SESSION['isLoggedIn'] = true;

header("location: ../index.php");
