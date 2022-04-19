<?php session_start();
    if ($_SESSION['type'] != 1) {
        echo 'Ты кто такой? Давай, до свидания!';
    } else {?>
        <html lang="ru">
            <head>
                <meta charset="utf-8"/>
                <title>Админ-панель</title>
                <link href="../../styles/admin.css" rel="stylesheet"/>
                <link href="../../styles/fonts.css" rel="stylesheet"/>
            </head>
            <body>
                <div class="header">
                    <a id="goBack" href="/index.php">
                        <img id="backPic" src="../../images/icons/menu/back.svg" alt="Назад">
                        <label>Назад</label>
                    </a>
                </div>
                <div class="content">
                    <label id="users">Список пользователей</label>
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";

                        DB::getInstance();
                        $checkoutQuery = "SELECT * FROM `users`";
                        $res = DB::query($checkoutQuery);
                        $s = "";

                        foreach ($res as $k=>$v) {
                            $buttons = '<td>'.'<a id="actionEdit" href="/pages/private/editUser.php?id='.$v['nick'].'">'. '<img id="iconEdit" src="/images/icons/admin/edit.svg" alt="Редактировать">' .'</a>'.'<a id="actionDelete" href="/pages/private/deleteUser.php?id='.$v['nick'].'">'. '<img id="iconDelete" src="/images/icons/admin/delete.svg" alt="Удалить">' .'</a>'.'</td>';
                            if ($k != 0) {
                                $s = $s."<tr>"."<td>".($k+1)."</td>"."<td>".$v['name']."</td>"."<td>".$v['nick']."</td>"."<td><img alt='' src='".$v['avatar']."'</td>"."<td>".(($v['type'] == 1) ? "Да" : "Нет")."</td>".$buttons."</tr>";
                            } else {
                                $s = "<tr>"."<td>".($k+1)."</td>"."<td>".$v['name']."</td>"."<td>".$v['nick']."</td>"."<td><img alt='' src='".$v['avatar']."'</td>"."<td>".(($v['type'] == 1) ? "Да" : "Нет")."</td>".$buttons."</tr>";
                            }
                        }

                        echo '<table>'.
                             '<tr>'.
                             '<th>#</th>'.
                             '<th>Имя</th>'.
                             '<th>Никнейм</th>'.
                             '<th>Аватарка</th>'.
                             '<th>Админ?</th>'.
                             '</tr>'.$s.'</table>';
                    ?>
                    <label id="stats">Игровая статистика</label>
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT']."/scripts/db.class.php";

                        DB::getInstance();
                        $checkoutQuery = "SELECT * FROM `game_stats`";
                        $res = DB::query($checkoutQuery);
                        $s = "";

                        foreach ($res as $k=>$v) {
                            if ($k == 10) break;
                            if ($k != 0) {
                                $s = $s."<tr>"."<td>".($k+1)."</td>"."<td>".$v['nick']."</td>"."<td>".$v['max_score']."</td>"."<td>".$v['total_length']."</td>"."<td>".$v['total_time']."</td>"."</tr>";
                            } else {
                                $s = "<tr>"."<td>".($k+1)."</td>"."<td>".$v['nick']."</td>"."<td>".$v['max_score']."</td>"."<td>".$v['total_length']."</td>"."<td>".$v['total_time']."</td>"."</tr>";
                            }
                        }

                        echo '<table>'.
                             '<tr>'.
                             '<th>#</th>'.
                             '<th>Никнейм</th>'.
                             '<th>Макс. счет</th>'.
                             '<th>Общая длина</th>'.
                             '<th>Общее время</th>'.
                             '</tr>'.$s.'</table>';
                    ?>
                </div>
            </body>
        </html>
    <?php
    }
?>

