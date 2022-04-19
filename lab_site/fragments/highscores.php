<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";

    DB::getInstance();
    $statsCheckoutQuery = "SELECT * FROM `game_stats` ORDER BY max_score DESC";
    $res = DB::query($statsCheckoutQuery);
    $s = "";

    foreach ($res as $k=>$v) {
        if ($k == 10) break;    // берем первых 10 человек
        if ($k != 0) {
            $s = $s."<tr>"."<td>".($k+1)."</td>"."<td>".$v['nick']."</td>"."<td>".$v['max_score']."</td>"."<td>".$v['total_length']."</td>"."<td>".$v['total_time']."</td>"."</tr>";
        } else {
            $s = "<tr>"."<td>".($k+1)."</td>"."<td>".$v['nick']."</td>"."<td>".$v['max_score']."</td>"."<td>".$v['total_length']."</td>"."<td>".$v['total_time']."</td>"."</tr>";
        }
    }
?>

<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Рекорды</title>
        <link rel="stylesheet" href="../styles/highscores.css">
        <link rel="stylesheet" href="../styles/fonts.css">
    </head>
    <body>
        <div class="header">
            <a onclick="goToMainScreen();">
                <img id="backPic" src="../images/icons/menu/back.svg" alt="Назад">
                <label>Back</label>
            </a>
        </div>
        <div id="gameHighscores">
            <?php
                echo '<table>'.
                     '<caption>Highscores</caption>'.
                     '<tr>'.
                     '<th>#</th>'.
                     '<th>Nickname</th>'.
                     '<th>Max score</th>'.
                     '<th>Total length</th>'.
                     '<th>Total time</th>'.
                     '</tr>'.$s.'</table>';
            ?>
        </div>
    </body>
    <script src="../scripts/gameController.js"></script>
</html>
