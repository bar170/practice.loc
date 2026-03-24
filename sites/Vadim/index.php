<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сайт Вадима</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>Добро пожаловать, Вадим!</h1>
    <?php
    use common\Tools;
    include_once '../common/bootstrap.php';

    $tools = new Tools();

    echo "<div class='result'>";
    echo $tools->getHello('Вадим');
    echo $tools->getCurrentTime();
    echo $tools->getDayOfWeek(getdate());
    echo "</div>";
    ?>
</div>
</body>
</html>
