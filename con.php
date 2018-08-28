<?php
include_once "files.php";
try{
    $pdo = new PDO("$driver:host=$host;db_name=$db_name;charset=$charset",
    $db_user, $pass, $options);
}catch(PDOException $e) {
    var_dump($e);
    die(Нет подключения к базе данных!);
}