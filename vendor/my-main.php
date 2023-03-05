<?php
session_start();
$hallo = $_SESSION['welcome_user'];
//echo 'Hallo, '. $_SESSION['welcome_user']. ' !';
if (!$_SESSION['welcome_user']) {
    header('Location: ../index.php');
}
?>


<form action="exit.php" method="post">

    </label>Hallo <?php echo $hallo ;?> !</label>
    <button type="submit">Выход</button>
</form>