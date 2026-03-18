<?php
require_once '.././../tools/Tools.php';

$tools = new Tools();
$day = getdate();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сайт Вадима</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1>Добро пожаловать, Вадим!</h1>
    <p><?= $tools->getHello() ?></p>
    <p><?= $tools->getCurrentTime() ?></p>
    <p><?= $tools->getDayOfWeek($day) ?></p>
</body>
</html>
