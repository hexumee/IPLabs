<?php
    function warn_f($msg) {
        echo '<div style="width: max-content; border-radius: 10px; background-color: wheat; padding: 15px 10px; margin-top: 24px">'.
                '<label style="font-size: 14px; color: #4D4D4D; font-weight: bold; font-family: '."Nunito".', serif">'.$msg.'</label>'.
             '</div>';
    }

    include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";

    $nick = $_POST['nickLog'];
    $passwd = $_POST['passwdLog'];

    if (empty($nick)) {
        warn_f("Поле «Никнейм» не может быть пустым!");
    } else if (empty($passwd)) {
        warn_f("Поле «Пароль» не может быть пустым!");
    } else {
        DB::getInstance();
        $query = "SELECT * FROM `users` WHERE `nick` = '$nick' and `passwd` = MD5('$passwd')";
        $res = DB::query($query);

        if(($item = DB::fetch_array($res)) != false) {
            $_SESSION['name'] = $item['name'];
            $_SESSION['nick'] = $item['nick'];
            $_SESSION['avatar'] = $item['avatar'];
            $_SESSION['type'] = $item['type'];
            echo '<script>'.
                    'window.top.location.href = "/index.php";'.
                 '</script>';
        } else {
            warn_f("Неправильный никнейм или пароль");
        }
    }
?>
