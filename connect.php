<?php

$connect = mysqli_connect('localhost', 'root', '', 'office');

if (!$connect) {
    die('Error connect to DataBase');
}

