<?php
session_start();
require_once "database/connection.php";

$select_user = $conn->prepare("SELECT * FROM account WHERE email = :email");
$select_user->bindParam(":email", $_POST['email']);
$select_user->execute();
$user = $select_user->fetch(PDO::FETCH_ASSOC);

var_dump($user);

if (password_verify($_POST['wachtwoord'], $user['wachtwoord'])) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    echo "WORKS!";
    header('Location: /');
}else{
    echo "Incorrect!";
}
