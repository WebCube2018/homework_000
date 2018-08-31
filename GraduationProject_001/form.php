<?php
require_once 'login.php';

$connection = new mysqli($hostName, $userName, $password, $dataBase);

//Пищем полученные данные в переменные
$name = $_REQUEST["name"];
$phone = $_REQUEST["phone"];
$email = $_REQUEST["email"];

$street = $_REQUEST["street"];
$home = $_REQUEST["home"];
$part = $_REQUEST["part"];
$appt = $_REQUEST["appt"];
$floor = $_REQUEST["floor"];
$comment = $_REQUEST["comment"];
$payment = $_REQUEST["payment"];
$callback = $_REQUEST["callback"];
$numOrder = date("d.m.y-h:m")."-".rand(1000, 10000);

require_once 'function.php';

$row = EmailAndId($connection, $email);

if ($connection->connect_error) {
    die($connection->connect_error);
} else {
    //Если соеденение с БД прошло успешно то идем дальше

    //Сверяем есть ли переданные email в БД
    if ($row['email'] == $email) {
        $result = addOrder($connection, $street, $home, $part, $appt, $comment, $numOrder, $row['id'], $floor);
        echo $result;
        sendOrder($numOrder, $street, $home, $part, $appt, $floor, $connection, $row['id']);
    } else {
        addUsers($connection, $name, $phone, $email);
        $row = EmailAndId($connection, $email);
        $result = addOrder($connection, $street, $home, $part, $appt, $comment, $numOrder, $row['id'], $floor);
        sendOrder($numOrder, $street, $home, $part, $appt, $floor, $connection, $row['id']);
        echo $result;
    }
}

$connection->close();
