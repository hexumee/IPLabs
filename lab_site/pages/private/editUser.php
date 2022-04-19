<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";
    DB::getInstance();
?>

<html lang="ru">
    <head>
        <meta charset="utf-8"/>
        <title>Профиль</title>
        <link href="../../styles/admin.css" rel="stylesheet"/>
        <link href="../../styles/fonts.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="header">
            <a id="goBack" href="/pages/private/admin.php">
                <img id="backPic" src="../../images/icons/menu/back.svg" alt="Назад">
                <label>Назад</label>
            </a>
        </div>
        <div id="centerView">
            <div class="contentEdit">
                <div id="profileInfo">
                    <div id="preview">
                        <?php
                            $checkoutQuery = "SELECT * FROM `users` WHERE `nick` = ".'"'.$_GET['id'].'"';
                            $res = DB::fetch_array(DB::query($checkoutQuery));
                            echo '<img id="pic" src="' . $res['avatar'] . '" alt="Аватарка">';
                            echo '<label id="profileName">'.$res['name'].'</label>';
                            echo '<label id="profileNick">'.$res['nick'].'</label>';
                        ?>
                    </div>
                    <form action="/pages/private/doEdit.php" method="post" enctype="multipart/form-data" id="changers">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <div id="nameChanger">
                            <label for="nameInput" class="fieldHeader">Изменить имя профиля</label>
                            <div class="input">
                                <input id="nameInput" placeholder="Иван Иванов" name="newName">
                            </div>
                        </div>
                        <div id="nickChanger">
                            <label for="nickInput" class="fieldHeader">Изменить никнейм профиля</label>
                            <div class="input">
                                <input id="nickInput" placeholder="ivan.ivanov" name="newNick">
                            </div>
                        </div>
                        <div id="passwdChanger">
                            <label for="passwdInput" class="fieldHeader">Изменить пароль</label>
                            <div class="input">
                                <input id="passwdInput" placeholder="qwerty1234" name="newPasswd">
                            </div>
                        </div>
                        <div id="picChanger">
                            <label for="picInput" class="fieldHeader">Изменить картинку профиля</label>
                            <div class="input">
                                <div id="fileInput">
                                    <label id="chosenFileName">Выберите файл</label>
                                    <input id="picInput" type="file" accept="image/*" onchange="setFileName();" name="newPic">
                                    <label for="picInput" id="chooser">Выбрать</label>
                                </div>
                            </div>
                        </div>
                        <button id="setNewInfo" type="submit">Изменить</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="../../scripts/util.js"></script>
</html>
