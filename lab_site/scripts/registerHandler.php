<?php
    function warn_f($msg) {
        echo '<div style="width: max-content; border-radius: 10px; background-color: wheat; padding: 15px 10px; margin-top: 24px"><label style="font-size: 14px; color: #4D4D4D; font-weight: bold; font-family: Arial, serif">'.$msg.'</label></div>';
    }

    $name = $_POST['name'];
    $nick = $_POST['nickReg'];
    $passwd = $_POST['passwdReg'];
    $passwdCheck = $_POST['passwdRegCheck'];

    if (empty($name)) {
        warn_f("Поле «Имя» не может быть пустым!");
    } else if (empty($nick)) {
        warn_f("Поле «Никнейм» не может быть пустым!");
    } else if (empty($passwd)) {
        warn_f("Поле «Пароль» не может быть пустым!");
    } else if (empty($passwdCheck)) {
        warn_f("Поле «Повтор пароля» не может быть пустым!");
    } else if ($passwd != $passwdCheck) {
        warn_f("Пароли не совпадают!");
    } else {
        header("location:/index.php");
    }

    $_SESSION['name'] = $name;
    $_SESSION['nick'] = $nick;


    // TODO: работа с базой данных

?>
