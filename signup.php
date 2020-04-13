<?php

session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];

$departament=$_POST['departament'];
$position=$_POST['position'];
$phone=$_POST['phone'];

{

    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке файла';
        header('Location: ../register.php');
    }


    mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `password`, `email`, `avatar`, `departament`, `position`, `phone`) VALUES (NULL, '$full_name', '$login',  '$password','$email', '$path', '$departament','$position','$phone')");

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../profile.php');


}

?>
