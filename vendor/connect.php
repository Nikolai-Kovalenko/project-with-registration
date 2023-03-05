<?php
#Не использованная страницы
$servername = "localhost";
$database = "for_test_project";
$username = "root";
$password = "";

// Создаем соединение
$connect = mysqli_connect($servername, $username, $password, $database);

// Проверяем соединение
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully ";
//mysqli_close($connect);

