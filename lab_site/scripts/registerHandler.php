<?php
    function warn_f($msg) {
        echo '<div style="width: max-content; border-radius: 10px; background-color: wheat; padding: 15px 10px; margin-top: 24px">'.
                '<label style="font-size: 14px; color: #4D4D4D; font-weight: bold; font-family: '."Nunito".', serif">'.$msg.'</label>'.
             '</div>';
    }

    include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";

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
        DB::getInstance();

        $checkQuery = "SELECT * FROM `users` WHERE `nick` = '$nick'";
        $res = DB::query($checkQuery);

        if(($item = DB::fetch_array($res)) != false) {
            warn_f("Выберите другой никнейм");
        } else {
            $regQuery = "INSERT INTO `users` (`name`, `nick`, `passwd`, `avatar`, `type`) VALUES ('$name', '$nick', MD5('".$passwd."'), '', 0)";
            DB::query($regQuery);
            $gameQuery = "INSERT INTO `game_stats` (`nick`, `max_score`, `total_length`, `total_time`) VALUES ('$nick', 0, 0, 0)";
            DB::query($gameQuery);
            $_SESSION['name'] = $name;
            $_SESSION['nick'] = $nick;
            $_SESSION['avatar'] = "";
            $_SESSION['type'] = 0;
            echo '<script>'.
                    'window.top.location.href = "/index.php";'.
                 '</script>';
        }
    }
?>
