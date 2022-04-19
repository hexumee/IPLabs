<?php session_start(); ?>

<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Игра</title>
        <link rel="stylesheet" href="../styles/game.css">
        <link rel="stylesheet" href="../styles/fonts.css">
    </head>
    <body>
        <?php
            if (isset($_SESSION['nick']) && $_SESSION['nick'] != "") {
                echo '<div id="gameFrame">'.
                        '<label id="header">The Snake</label>'.
                        '<div id="gameMenus">'.
                            '<a id="start" href="#" onclick="fireItUp()">Start</a>'.
                            '<a id="table" href="#" onclick="loadHighscores()">Highscores</a>'.
                        '</div>'.
                     '</div>';
            } else {
                echo '<div id="noAuth">'.
                         '<div class="heading">'.
                            '<h1>Сделал игру! Только я вам её не покажу! Потому что у вас документов нету.</h1>'.
                            '<h3>Усы, лапы и хвост – вот мои документы! (с)</h3>'.
                         '</div>'.
                         '<div class="content">'.
                            '<p>'.
                                'Для продолжения необходмио <a id="gameLogister" onclick="callModal();" href="#">войти или зарегистрироваться</a>.<br>'.
                            '</p>'.
                         '</div>'.
                     '</div>';
            }
        ?>
    </body>
    <script src="../scripts/jquery-3.6.0.min.js"></script>
    <script src="../scripts/gameController.js"></script>
</html>
