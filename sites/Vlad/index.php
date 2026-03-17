<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>V-pdnk</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>V-pdnk site</h1>

    <?php
    use common\Tools;
    include_once '../common/bootstrap.php';

    $tools = new Tools();

    echo "<div class='result'>";
    echo $tools->getHello('Vlad');
    echo $tools->getDayOfWeek(getdate());
    echo "</div>";
    ?>

</div>
</body>
</html>
