<?php
    function warn_f($msg) {
        echo '<div style="position: absolute; top: 64px; left: 16px; width: max-content; height: 18px; border-radius: 10px; background-color: wheat; padding: 15px 10px; margin-top: 24px">'.
                '<label style="font-size: 14px; color: #4D4D4D; font-weight: bold; font-family: '."Nunito".', serif">'.$msg.'</label>'.
             '</div>';
    }

    function done_f($msg) {
        echo '<div style="position: absolute; top: 64px; left: 16px; width: max-content; height: 18px; border-radius: 10px; background-color: lightgreen; padding: 15px 10px; margin-top: 24px">'.
                '<label style="font-size: 14px; color: #4D4D4D; font-weight: bold; font-family: '."Nunito".', serif">'.$msg.'</label>'.
             '</div>';
    }

    session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";
    $isChanged = false;

    DB::getInstance();

    if ($_POST["newName"] != "") {
        $query = "UPDATE `users` SET `name` = '".$_POST["newName"]."'"."WHERE nick = "."'".$_SESSION['nick']."'";
        DB::query($query);
        $_SESSION['name'] = $_POST["newName"];
        done_f("Успешно");
    }

    if ($_POST["newNick"] != "") {
        $checkQuery = "SELECT * FROM `users` WHERE `nick` = '".$_POST["newNick"]."'";
        $res = DB::query($checkQuery);

        if (($item = DB::fetch_array($res)) != false) {
            warn_f("Выберите другой никнейм");
        } else {
            $query = "UPDATE `users` SET `nick` = '".$_POST["newNick"]."'"."WHERE nick = "."'".$_SESSION['nick']."'";
            DB::query($query);
            $gameQuery = "UPDATE `game_stats` SET `nick` = '".$_POST["newNick"]."'"."WHERE nick = "."'".$_SESSION['nick']."'";
            DB::query($gameQuery);
            $_SESSION['nick'] = $_POST["newNick"];
            done_f("Успешно");
        }
    }

    if ($_POST["newPasswd"] != "") {
        $query = "UPDATE `users` SET `passwd` = '".MD5($_POST["newPasswd"])."'"."WHERE nick = "."'".$_SESSION['nick']."'";
        DB::query($query);
        done_f("Успешно");
    }

    if (isset($_FILES['newPic']) && $_FILES['newPic']['tmp_name'] != "") {
        $path = $_FILES['newPic']['tmp_name'];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64Image = 'data:image/'.$type.';base64,'.base64_encode($data);

        $query = "UPDATE `users` SET `avatar` = '".$base64Image."'"."WHERE nick = "."'".$_SESSION['nick']."'";
        DB::query($query);
        $_SESSION['avatar'] = $base64Image;
        done_f("Успешно");
    }
?>

