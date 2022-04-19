<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";

    DB::getInstance();

    if ($_POST["newName"] != "") {
        $query = "UPDATE `users` SET `name` = '".$_POST["newName"]."'"."WHERE nick = "."'".$_POST['id']."'";
        DB::query($query);
        header("location: /pages/private/admin.php");
    }

    if ($_POST["newNick"] != "") {
        $checkQuery = "SELECT * FROM `users` WHERE `nick` = '".$_POST["newNick"]."'";
        $res = DB::query($checkQuery);

        if (($item = DB::fetch_array($res)) != false) {
            echo "Выберите другой никнейм";
        } else {
            $query = "UPDATE `users` SET `nick` = '".$_POST["newNick"]."'"."WHERE nick = "."'".$_POST['id']."'";
            DB::query($query);
            $gameQuery = "UPDATE `game_stats` SET `nick` = '".$_POST["newNick"]."'"."WHERE nick = "."'".$_POST['id']."'";
            DB::query($gameQuery);
            header("location: /pages/private/admin.php");
        }
    }

    if ($_POST["newPasswd"] != "") {
        $query = "UPDATE `users` SET `passwd` = '".MD5($_POST["newPasswd"])."'"."WHERE nick = "."'".$_POST['id']."'";
        DB::query($query);
        header("location: /pages/private/admin.php");
    }

    if (isset($_FILES['newPic']) && $_FILES['newPic']['tmp_name'] != "") {
        $path = $_FILES['newPic']['tmp_name'];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64Image = 'data:image/'.$type.';base64,'.base64_encode($data);

        $query = "UPDATE `users` SET `avatar` = '".$base64Image."'"."WHERE nick = "."'".$_POST['id']."'";
        DB::query($query);
        header("location: /pages/private/admin.php");
    }
?>
