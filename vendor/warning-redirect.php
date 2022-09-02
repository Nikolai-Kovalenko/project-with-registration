<?php
session_start();
if ($_SESSION['welcome_user']) {
    header('Location: vendor/my-main.php');
}