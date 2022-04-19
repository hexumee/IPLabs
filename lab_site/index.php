<?php session_start(); ?>

<html lang="ru">
    <head>
        <meta charset="utf-8"/>
        <title>Просто сайт</title>
        <link href="styles/style.css" rel="stylesheet"/>
        <link href="styles/fonts.css" rel="stylesheet"/>
        <link href="styles/menu.css" rel="stylesheet"/>
        <script src="scripts/fragmentManager.js"></script>
    </head>
    <body>
        <div class="header">
            <div id="menuNest">
                <nav class="menu">
                    <input type="checkbox" id="checkbox" class="menu_checkbox">
                    <label for="checkbox" class="menu_button">
                        <div class="menu_icon"></div>
                    </label>
                    <div class="menu_container">
                        <ul class="menu_list">
                            <li class="menu_item">
                                <a class="menu_link" href="#" onclick="document.getElementById('checkbox').click(); setHomeContent();">
                                    <div id="goHome">
                                        <img id="homePic" src="images/icons/menu/home.svg" alt="Домой">
                                        <label>Главная</label>
                                    </div>
                                </a>
                            </li>
                            <li class="menu_item">
                                <a class="menu_link" href="#done" onclick="document.getElementById('checkbox').click(); setDoneContent();">
                                    <div id="goDone">
                                        <img id="donePic" src="images/icons/menu/done.svg" alt="Выполненные работы">
                                        <label>Выполненные работы</label>
                                    </div>
                                </a>
                            </li>
                            <li class="menu_item">
                                <a class="menu_link" href="#gallery" onclick="document.getElementById('checkbox').click(); setPhotosContent();">
                                    <div id="goGallery">
                                        <img id="galleryPic" src="images/icons/menu/gallery.svg" alt="Фотогалерея">
                                        <label>Фотогалерея</label>
                                    </div>
                                </a>
                            </li>
                            <li class="menu_item">
                                <a class="menu_link" href="#about" onclick="document.getElementById('checkbox').click(); setAboutContent();">
                                    <div id="goAbout">
                                        <img id="aboutPic" src="images/icons/menu/about.svg" alt="О себе">
                                        <label>О себе</label>
                                    </div>
                                </a>
                            </li>
                            <li class="menu_item">
                                <a class="menu_link" href="#contacts" onclick="document.getElementById('checkbox').click(); setContactsContent();">
                                    <div id="goContacts">
                                        <img id="contactsPic" src="images/icons/menu/contacts.svg" alt="Контакты">
                                        <label>Контакты</label>
                                    </div>
                                </a>
                            </li>
                            <li class="menu_item">
                                <a class="menu_link" href="#game" onclick="document.getElementById('checkbox').click(); setGameContent();">
                                    <div id="goGame">
                                        <img id="gamePic" src="images/icons/menu/game.svg" alt="Игра">
                                        <label>Игра</label>
                                    </div>
                                </a>
                            </li>
                            <?php
                                if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
                                    echo '<li class="menu_item">'.
                                             '<a class="menu_link" href="pages/private/admin.php">'.
                                                 '<div id="goAdmin">'.
                                                     '<img id="adminPic" src="images/icons/menu/admin.svg" alt="Админ-панель">'.
                                                     '<label>Админ-панель</label>'.
                                                 '</div>'.
                                             '</a>'.
                                         '</li>';
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="navBar">
                <a href="#" onclick="setHomeContent();">
                    <div id="goHome">
                        <img id="homePic" src="images/icons/menu/home.svg" alt="Домой">
                        <label>Главная</label>
                    </div>
                </a>
                <a href="#done" onclick="setDoneContent();">
                    <div id="goDone">
                        <img id="donePic" src="images/icons/menu/done.svg" alt="Выполненные работы">
                        <label>Выполненные работы</label>
                    </div>
                </a>
                <a href="#gallery" onclick="setPhotosContent();">
                    <div id="goGallery">
                        <img id="galleryPic" src="images/icons/menu/gallery.svg" alt="Фотогалерея">
                        <label>Фотогалерея</label>
                    </div>
                </a>
                <a href="#about" onclick="setAboutContent();">
                    <div id="goAbout">
                        <img id="aboutPic" src="images/icons/menu/about.svg" alt="О себе">
                        <label>О себе</label>
                    </div>
                </a>
                <a href="#contacts" onclick="setContactsContent();">
                    <div id="goContacts">
                        <img id="contactsPic" src="images/icons/menu/contacts.svg" alt="Контакты">
                        <label>Контакты</label>
                    </div>
                </a>
                <a href="#game" onclick="setGameContent();">
                    <div id="goGame" >
                        <img id="gamePic" src="images/icons/menu/game.svg" alt="Игра">
                        <label>Игра</label>
                    </div>
                </a>
                <?php
                    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
                        echo '<a href="pages/private/admin.php">'.
                                  '<div id="goAdmin">'.
                                      '<img id="adminPic" src="images/icons/menu/admin.svg" alt="Админ-панель">'.
                                      '<label>Админ-панель</label>'.
                                  '</div>'.
                              '</a>';
                    }
                ?>
            </div>
            <div class="user">
                <?php
                    if (!isset($_SESSION['name'])) {
                        echo '<a id="logister" onclick="callModal();" href="#">Вход / регистрация</a>';
                    } else {
                        echo '<a id="profile" href="pages/profile.php">'.
                                  '<div id="goProfile">'.
                                      '<img id="profilePic" src="'.($_SESSION['avatar'] == "" ? "/images/icons/menu/dummy.svg" : $_SESSION['avatar']).'" alt="Профиль" class="'.($_SESSION['avatar'] == "" ? 'dummyAvatar' : 'userAvatar').'">'.
                                      '<label>'.$_SESSION['name'].'</label>'.
                                  '</div>'.
                              '</a>';
                    }
                ?>
            </div>
        </div>
        <div class="container">
            <div id="viewport">
                <iframe id="rootView" src="fragments/home.html"></iframe>
            </div>
        </div>
    </body>
</html>
