<?php
require_once '../../common/Tools.php';

$tools = new Tools();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сайт Вадима</title>
</head>
<body>
    <h1>Добро пожаловать, Вадим!</h1>
    <p><?= $tools->getHello() ?></p>
    <p><?= $tools->getCurrentTime() ?></p>
    <p><?= $tools->getDayOfWeek(getdate()) ?></p>
</body>
</html>
