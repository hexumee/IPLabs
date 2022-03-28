<?php session_start(); ?>

<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Вход / регистрация</title>
        <link href="../styles/modal.css" rel="stylesheet"/>
        <script src="../scripts/modalController.js"></script>
    </head>
    <body id="modalWindow">
        <div class="modal">
            <div id="register">
                <label id="reg">Регистрация</label>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="modal_cred">
                        <label for="name">Имя</label><input id="name" name="name" type="text" placeholder="Иван Иванов">
                        <label for="nickReg">Никнейм</label><input id="nickReg" name="nickReg" type="text" placeholder="ivanov.ivan">
                        <label for="passwdReg">Пароль</label><input id="passwdReg" name="passwdReg" type="password" placeholder="qwerty1234">
                        <label for="passwdRegCheck">Пароль (еще раз)</label><input id="passwdRegCheck" name="passwdRegCheck" type="password" placeholder="qwerty1234">
                    </div>
                    <button id="actionReg" type="submit" name="reg">Зарегистрироваться</button>
                </form>
                <?php
                    if (isset($_POST["reg"])) {
                        include_once "../scripts/registerHandler.php";
                    }
                ?>
            </div>
            <div id="divider"></div>
            <div id="login">
                <label id="log">Вход</label>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="modal_cred">
                        <label for="nickLog">Никнейм</label><input id="nickLog" type="text" placeholder="ivanov.ivan">
                        <label for="passwdLog">Пароль</label><input id="passwdLog" type="password" placeholder="qwerty1234">
                    </div>
                    <button id="actionLog" type="submit" name="log">Войти</button>
                </form>
                <?php
                    if (isset($_POST["log"])) {
                        include_once "../scripts/loginHandler.php";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
