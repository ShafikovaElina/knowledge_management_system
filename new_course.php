<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавить курс</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма регистрации -->

<form action="vendor/newс.php" method="post" enctype="multipart/form-data">
    <label>Название</label>
    <input type="text" name="title" placeholder="Введите название проекта">
    <label>Описание</label>
    <input type="text" name="descripttion" placeholder="Введите краткое описание">
    <label>Компетенция</label>
    <input type="text" name="competencies" placeholder="Введите заказчика">
    <label>Материал</label>
    <input type="text" name="materials" placeholder="Введите дату начала">
    <label>Тест</label>
    <input type="test" name="test" placeholder="Введите дату окончания">


    <button type="submit">Добавить курс</button>
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