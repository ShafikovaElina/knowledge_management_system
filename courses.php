<?php
session_start();

if (!$_SESSION['user']) {
    header('Location: index.php');

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="#">СУЗ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <a href="courses.php"><button type="button" class="btn btn-light">Курсы</button></a>
        <a href="register.php"> <button type="button" class="btn btn-light">Добавить сотрудника</button></a>
        <a href="new_project.php"> <button type="button" class="btn btn-light">Добавить проект</button></a>
    </div>

    <form class="form-inline my-2 my-lg-0">
        <a href="vendor/logout.php"><button type="button" class="btn btn-light">Выход</button></a>
    </form>
</nav>
        <h2 align="center" >Все курсы</h2>

<?php
    $connect = mysqli_connect('localhost', 'root', '', 'office');
    $result= mysqli_query($connect,"SELECT * FROM `courses`");


?>
<?php foreach ($result as $results): ?>
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-11">
        <h4><a><?=$results['title'] ?></a></h4>
        <p>
            <?=$results['description'] ?>
        </p>
        <p><a class="btn-info btn-sm" href="#">Записаться</a></p>
        <br/>
        <ul class="list-inline">
            <li><i class="glyphicon glyphicon-user"></i> автор <a href="#"><?=$results['avtor'] ?></a> | </li>
            <li><i class="glyphicon glyphicon-calendar"></i> <?=$results['data_time'] ?> </li>

        </ul>
    </div>
</div>
<?php endforeach; ?>