<?php
session_start();

unset($_SESSION['welcome_user']);
header('Location: ../index.php');
