<?php
require_once '../../common/Tools.php';

$tools = new Tools();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сайт Вадима</title>
<!--    Где верстка?
надо было восстановить состояние. Если по гиту сложно отследить, то просто на примере
Даниила или Влада <- Папки рядом с твоей
-->
</head>
<body>
    <h1>Добро пожаловать, Вадим!</h1>
    <p><?= $tools->getHello('Где тут твое имя?') ?></p>
    <p><?= $tools->getCurrentTime() ?></p>
    <p><?= $tools->getDayOfWeek(getdate()) ?></p> <!-- Ошибку же выдает, потому что функции не существует.
   Потому что не правильный же require_once '../../common/Tools.php' не на тот Tools указывает-->
</body>
</html>
