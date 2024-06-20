<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header("location: ../login-signup.php?errorSignUp=Error%20try%20again");
    return;
}

if ($_POST['email'] == '' || $_POST['password'] == '') {
    header("location: ../login-signup.php?errorSignUp=Please%20enter%20both%20inputs");
    return;
}

session_start();

include("./Connection.php");

use Connection\Connection;

$db = new Connection();
$connection = $db->getConnection();

$email = $_POST['email'];
$password = $_POST['password'];

$getUser = $connection->prepare('SELECT * FROM `users` WHERE `email` = :email');
$getUser->bindParam(':email', $email);
$getUser->execute();
$user = $getUser->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $passwordDB = $user['password'];

    if (password_verify($password, $passwordDB)) {
        if ($user['email'] == 'admin@admin.com') {
            $_SESSION['isAdmin'] = true;
        }

        $_SESSION['user'] = $user['email'];
        $_SESSION['userID'] = $user['id'];
        $_SESSION['isLoggedIn'] = true;

        header("location: ../index.php");
        return;
    }

    header("location: ../login-signup.php?errorLogin=Invalid%20password");
    return;
}

header("location: ../login-signup.php?errorLogin=Email%20not%20found");
