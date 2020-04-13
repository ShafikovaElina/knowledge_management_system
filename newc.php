<?php
session_start();
require_once 'connect.php';

$title = $_POST['title'];
$descripttion = $_POST['descripttion'];
$competencies = $_POST['competencies'];
$materials = $_POST['materials'];
$test = $_POST['test'];
$avtor=$_SESSION['user']['full_name'];


{

    mysqli_query($connect, "INSERT INTO `courses` (`id`, `title`, `descripttion`, `competencies`, `materials`, `test`, `data_time`,`avtor`) VALUES (NULL, '$title', '$descripttion',  '$competencies','$materials', '$test', DATE(),$avtor)");

    $_SESSION['message'] = 'Курс добавлен успешно!';
    header('Location: ../profile.php');


}

