<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";
    DB::getInstance();

    $gameCheckoutQuery = "SELECT * FROM `game_stats` WHERE `nick` = ".'"'.$_SESSION['nick'].'"';
    $res = DB::fetch_array(DB::query($gameCheckoutQuery));

    $newMaxScore = $_POST['score'] > $res['max_score'] ? $_POST['score'] : $res['max_score'];
    $newTotalLength = $res['total_length'] + $_POST['score'];
    $newTotalTime = $res['total_time'] + $_POST['time'];

    $query = "UPDATE `game_stats` SET `max_score` = '".$newMaxScore."',
                                      `total_length` = '".$newTotalLength."',
                                      `total_time` = '".$newTotalTime."'"."
                                  WHERE nick = "."'".$_SESSION['nick']."'";
    DB::query($query);
?>
