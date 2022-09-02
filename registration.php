<?php
//session_start();
unset($_SESSION['registration_end']);
$titel = 'Зарегестрироватся';
require "blocks/header.php";
    require "vendor/warning-redirect.php";

function msg($ses_name){
    if ($_SESSION[$ses_name]) {
        echo '<p class="msg">' . $_SESSION[$ses_name] . ' </p>';
    }
    unset($_SESSION[$ses_name]);
}
?>

<form action="vendor/registration-processing.php" method="post" enctype="multipart/form-data">
    <!--    Псевдоним/логин    -->
    </label>Логин</label>
    <input type="text" name="login" value="<?= $_SESSION['login'] ?>" placeholder="Введи свой Логин">
    <?php
    msg('error_login');
    ?>
    <!--    Изображение профиля    -->
    </label>Изображение профиля </label>
    <input type="file" name="avatar" value="<?=$_FILES['avatar']['tmp_name']?>"
    <?php
    msg('error_avatar');
    ?>
    <!--    Почта   -->
    </label>Почта</label>
    <input type="email" name="email" value="<?= $_SESSION['email'] ?>" placeholder="Введи свою почту">
    <?php
    msg('error_email');
    ?>
    <!--    Пароль    -->
    </label>Пароль</label>
    <input type="password" name="password" placeholder="Введи пароль">
    <!--    Подтвердите пароль    -->
    </label>Подтвердите пароль</label>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
    <?php
    msg('error_password');
    ?>
    <button type="submit">Зарегистрироваться</button>

</form>


<?php
require "blocks/footer.php";
?>
