
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
<div class="row">
    <div class="col-lg-3">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <img src="<?=$_SESSION['user']['avatar']?>">
                <form>
                        <div class="form-group">
                        <label for="exampleInputEmail1">ФИО</label>
                        <h4><?=$_SESSION['user']['full_name']?></h4>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Отдел</label>
                        <h4><?=$_SESSION['user']['departament']?></h4>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Должность</label>
                        <h4><?=$_SESSION['user']['position']?></h4>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Телефон</label>
                        <h4><?=$_SESSION['user']['phone']?></h4>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">E-mail</label>
                        <h4><?=$_SESSION['user']['email']?></h4>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php
    $person=$_SESSION['user']['full_name'];
    $connect = mysqli_connect('localhost', 'root', '', 'office');
    $result= mysqli_query($connect,"SELECT * FROM `project` WHERE team LIKE '%$person%'");
    ?>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-11">
                <h2>Проекты</h2>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="active">
                    <th>Название</th>
                    <th>Статус</th>
                    <th>Описание</th>
                    <th>Задачи</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr> <?php
                        while($row=mysqli_fetch_array($result))
                        {
                            if( $row['datestart'] <= date('Y-m-d H:i:s') )
                            {
                                if( $row['dateend'] >= date('Y-m-d H:i:s') )
                                { echo "<tr><td>" . $row["title"]
                                    . "</td> <td bgcolor='#ff8c00'>В разработке</td><td>" . $row["description"]
                                    . "</td><td>Ссылка на Jira</td></tr>"; }
                                else if ($row['dateend'] <= date('Y-m-d H:i:s') )
                                { echo "<tr><td>" . $row["title"]
                                    . "</td> <td bgcolor='#32cd32'>Завершён</td><td>" . $row["description"]
                                    . "</td><td>Ссылка на Jira</td></tr>"; }
                            }
                        }
                        ?></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1"></div>

        </div>
        <?php
        $result1= mysqli_query($connect,"SELECT * FROM `competencies` ");
        ?>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-11">
                    <h2>Компетенции</h2>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="active">
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Уровень</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr> <?php
                            while($row=mysqli_fetch_array($result1))
                            {
                                $lvl=rand(1, 5);
                                echo "<tr><td>" . $row["title"]
                                        . "</td><td>" . $row["description"]
                                        . "</td><td>" . $lvl
                                        . "</td></tr>";

                            }
                            ?></tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-1"></div>

            </div>
</div>

</body>
</html>