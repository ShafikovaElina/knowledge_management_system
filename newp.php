<?php

session_start();
require_once 'connect.php';

$title = $_POST['title'];
$customer = $_POST['customer'];
$datestart = $_POST['datestart'];
$dateend = $_POST['dateend'];

$descripttion=$_POST['descripttion'];

$team=$_POST['team'];

{

    mysqli_query($connect, "INSERT INTO `project` (`id`, `title`, `customer`, `datestart`, `dateend`, `descripttion`, `team`) VALUES (NULL, '$title', '$customer',  '$datestart','$dateend', '$descripttion', '$team')");

    $_SESSION['message'] = 'Проект добавлен успешно!';
    header('Location: ../profile.php');


}

?>
