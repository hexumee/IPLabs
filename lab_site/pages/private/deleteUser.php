<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";

    DB::getInstance();
    $query = "DELETE FROM `users` WHERE `nick` = ".'"'.$_GET['id'].'"';
    DB::query($query);
    $gameQuery = "DELETE FROM `game_stats` WHERE `nick` = ".'"'.$_GET['id'].'"';
    DB::query($gameQuery);
    header("location: /pages/private/admin.php");
?>
