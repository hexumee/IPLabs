<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";
    DB::getInstance();
?>

<html lang="ru">
    <head>
        <meta charset="utf-8"/>
        <title>Профиль</title>
        <link href="../styles/profile.css" rel="stylesheet"/>
        <link href="../styles/fonts.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="header">
            <a id="goBack" href="/index.php">
                <img id="backPic" src="../images/icons/menu/back.svg" alt="Назад">
                <label>Назад</label>
            </a>
            <a id="logout" href="../scripts/logout.php">Выйти</a>
        </div>
        <div id="centerView">
            <div class="content">
                <?php
                if (isset($_POST["edit"])) {
                    include_once "../scripts/dbManager.php";
                }
                ?>
                <div id="profileInfo">
                    <div id="preview">
                        <?php
                            if (isset($_SESSION['avatar']) && $_SESSION['avatar'] != "") {
                                echo '<img id="pic" src="'.$_SESSION['avatar'].'" alt="Аватарка">';
                            } else {
                                echo '<img id="dummyPic" src="../images/icons/menu/dummy.svg" alt="Аватарка">';
                            }
                        ?>
                        <label id="profileName"><?php echo $_SESSION['name']?></label>
                        <label id="profileNick"><?php echo $_SESSION['nick']?></label>
                    </div>
                    <form action="#" method="post" enctype="multipart/form-data" id="changers">
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
                        <div id="commitChanges">
                            <button id="setNewInfo" type="submit" name="edit">Изменить</button>
                        </div>
                    </form>
                </div>
                <div id="gameInfo">
                    <label id="statsLabel">Статистика по игре</label>
                    <p id="stats">
                        <?php
                            function getTable() {
                                $statsCheckoutQuery = "SELECT * FROM `game_stats` ORDER BY max_score DESC";
                                $res = DB::query($statsCheckoutQuery);

                                foreach ($res as $k=>$v) {
                                    if ($v['nick'] == $_SESSION['nick']) {
                                        return $k+1;
                                    }
                                }

                                return null;
                            }

                            $gameCheckoutQuery = "SELECT * FROM `game_stats` WHERE `nick` = ".'"'.$_SESSION['nick'].'"';
                            $res = DB::fetch_array(DB::query($gameCheckoutQuery));
                            echo "Наивысший результат: ".$res['max_score']."<br>";
                            echo "Место в таблице рекордов: ".getTable()."<br>";
                            echo "Общая длина змейки: ".$res['total_length']."<br>";
                            echo "Общее время игры: ".$res['total_time']."<br>";
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </body>
    <script src="../scripts/util.js"></script>
</html>
