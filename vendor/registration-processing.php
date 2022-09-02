<?php
session_start();
require_once "connect.php";

unset($_SESSION['login']);
unset($_SESSION['error_login']);
unset($_SESSION['email']);
unset($_SESSION['error_email']);
unset($_SESSION['password']);
unset($_SESSION['password_confirm']);
unset($_SESSION['error_password']);
unset($_SESSION['registration_end']);


function redirect()
{
    header('Location: ../registration.php');
}

$login = $_POST['login'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$password_confirm = $_POST['password_confirm'];

$_SESSION['login'] = $login;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['password_confirm'] = $password_confirm;

$avatar = $_FILES['avatar'];


$path = 'uploads/'. time(). $_FILES['avatar']['name'];
if (!$login) {
    $_SESSION['error_login'] = 'Поле \'Логин\' обязательно для ввода!';
    redirect();
} elseif (!$email) {
    $_SESSION['error_email'] = 'Поле \'Почта\' обязательно для ввода!';
    redirect();
}  elseif (strlen($password) < 8) {
    $_SESSION['error_password'] = 'Пароль должен содержать больше 8 символов!';
    redirect();
} elseif (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'. $path)) {
    $_SESSION['error_avatar'] = 'Ошибка при загрузке фото';
    redirect();
} else {
    $sql = "INSERT INTO `users` (`id`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$login' , '$email', '$password', '$path')";
    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully";
        $_SESSION['registration_end'] = 'Регистрация прошла успешно, можете входить в аккаунт';
        header('Location: ../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);


}


