<?php
require_once "connect.php";

$login = $_POST['login'];
$email = $_POST['email'];
$password = md5($_POST['password2']);
$avatar = $_FILES


$sql = "INSERT INTO `users` (`id`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$login', '$email', '$password', NULL)";
if (mysqli_query($connect, $sql)) {
    echo "New record created successfully";
} else {$conn
    echo "Error: " . $sql . "<br>" . mysqli_error();
}
mysqli_close($connect);

$_SESSION['registration_end'] = 'Регистрация прошла успешно, можете входить в аккаунт';
//header('Location: ../index.php');
?>

