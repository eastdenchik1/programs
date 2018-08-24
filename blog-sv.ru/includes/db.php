<?php


$connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['user'],
    $config['db']['password'],
    $config['db']['dbname']
);

if ($connection == false){
    echo 'Упсс... Проблема с пожключение к БД';
    echo mysqli_connect_error();
    exit();
}