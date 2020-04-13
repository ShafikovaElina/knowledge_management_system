<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма регистрации -->

<form action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <label>ФИО</label>
    <input type="text" name="full_name" placeholder="Введите полное имя">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите логин">
    <label>Почта</label>
    <input type="email" name="email" placeholder="Введите адрес почты">
    <label>Отдел</label>
    <input type="text" name="departament" placeholder="Введите отдел">
    <label>Должность</label>
    <input type="text" name="position" placeholder="Введите должность">
    <label>Телефон</label>
    <input type="text" name="phone" placeholder="Введите номер телефона">
    <label>Изображение профиля</label>
    <input type="file" name="avatar">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">

    <button type="submit">Зарегестрируйтесь</button>
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
