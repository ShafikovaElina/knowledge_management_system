<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавить проект</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма регистрации -->

<form action="vendor/newp.php" method="post" enctype="multipart/form-data">
    <label>Название</label>
    <input type="text" name="title" placeholder="Введите название проекта">
    <label>Клиент</label>
    <input type="text" name="customer" placeholder="Введите заказчика">
    <label>Дата начала проекта</label>
    <input type="date" name="datestart" placeholder="Введите дату начала">
    <label>Дата окончания проекта</label>
    <input type="date" name="dateend" placeholder="Введите дату окончания">
    <label>Описание</label>
    <input type="text" name="descripttion" placeholder="Введите краткое описание">
    <label>Команда</label>
    <input type="text" name="team" placeholder="Введите членов команды">


    <button type="submit">Добавить проект</button>
    <p>
        <a href="profile.php">Вернуться в личный кабинет</a>!
    </p>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
</form>

</body>
</html>