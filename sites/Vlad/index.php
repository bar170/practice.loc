<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ыпвпа</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>Сайтик пам парам</h1>

    <?php
    use common\Tools;
    include_once '../common/bootstrap.php';

    $tools = new Tools();

    echo "<div class='result'>";
    echo $tools->getHello('Неизвестный');
    echo "</div>";
    ?>

</div>
</body>
</html>
