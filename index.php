<?php
//session_start();
$titel = 'Главная страница';
require "blocks/header.php";
?>

<form action="" method="post">
    <?php
    if ($_SESSION[registration_end]) {
    echo '<p class="msg">' . $_SESSION[registration_end] . ' </p>';
    }
    unset($_SESSION[registration_end]);

    ?>
    </label>Логин</label>
    <input type="text" placeholder="Введи свой логин" >
    </label>Пароль</label>
    <input type="password" placeholder="Введи пароль">
    <button type="submit">Войти</button>
    <p>
        У вас не аккаунта? - <a href="registration.php">Зарегистрируйтесь</a>
    </p>

</form>

<?php
require "blocks/footer.php";
?>