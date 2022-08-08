<?php
session_start();
require_once "connect.php";


unset($_SESSION['login']);
unset($_SESSION['error_login']);
unset($_SESSION['email']);
unset($_SESSION['error_email']);
unset($_SESSION['password']);
unset($_SESSION['password2']);
unset($_SESSION['error_password']);
unset($_SESSION['registration_end']);


function redirect()
{
    header('Location: ../registration.php');
}

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$_SESSION['login'] = $login;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['password2'] = $password2;

$avatar = $_FILES['avatar'];

?>
<!--<pre>-->
<!--    --><?php
//    print_r($_FILES);
//    ?>
<!--</pre>-->
<?php

if (!$login) {
    $_SESSION['error_login'] = 'Поле \'Логин\' обязательно для ввода!';
    redirect();
}  elseif (!$email) { #TODO в блоке elseif добавит добавление данных в БД, а уже после этого делать след. проверки
    $_SESSION['error_email'] = 'Поле \'Почта\' обязательно для ввода!';
    redirect();
} elseif ($password != $password2) {
    $_SESSION['error_password'] = 'Пароли не совпадают!';
    redirect();
} elseif (strlen($password) < 8) {
    $_SESSION['error_password'] = 'Пароль должен содержать больше 8 символов!';
    redirect();
} elseif (strlen($password) > 8) {
    $_SESSION['registration_end'] = 'Регистрация прошла успешно, можете входить в аккаунт';
    header('Location: ../index.php');
}


//    else {
//    $_SESSION['registration_end'] = 'Регистрация прошла успешно, можете входить в аккаунт';
//    header('Location: ../index.php');
//}
//
