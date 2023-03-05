<?php
session_start();
require_once "connect.php";

$login = $_POST['loginForAuthorization'];
$password = md5($_POST['passwordForAuthorization']);

//$sql = "SELECT * FROM `users` WHERE `login` =  '$login' AND `password` = '$password'";

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` =  '$login' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0) {
    $_SESSION['welcome_user'] = $login;
    header('Location: my-main.php');
} else {
    $_SESSION['invaild_data'] = '#';
    header('Location: ../index.php');
}
