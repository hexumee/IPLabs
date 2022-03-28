<?php session_start(); ?>

<html lang="ru">
    <head>
        <meta charset="utf-8"/>
        <title>Лабораторная работа #2</title>
        <link href="styles/style.css" rel="stylesheet"/>
        <script src="scripts/fragmentManager.js"></script>
    </head>
    <body>
        <div class="header">
            <div class="navBar">
                <button id="navGraphBack" onclick="navGoBack()">
                    <img src="images/nav/next.png" style="transform: rotate(-180deg); width: 32px; height: 28px;" alt="Назад">
                </button>
                <label id="currentPage">Главная</label>
            </div>
            <div class="user">
                <?php
                    if (!isset($_SESSION['name'])) {
                        echo '<a id="logister" onclick="callModal();" href="#">Вход / регистрация</a>';
                    } else {
                        echo '<label id="loggedIn">'.$_SESSION['name']." (".$_SESSION['nick'].")".'</label> <a id="logout" href="scripts/logout.php"">Выйти</a>';
                    }
                ?>
            </div>
        </div>
        <div class="container">
            <div id="viewport">
                <iframe id="rootView" src="fragments/home.html"></iframe>
            </div>
        </div>
        <div class="footer">
            <div class="dw">
                <label>Разработано в PhpStorm</label>
            </div>
            <div class="ac">
                <label>2022, Дмитрий Нуждов</label>
            </div>
        </div>
    </body>
</html>
