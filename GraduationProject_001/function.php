<?php

//Функция добавления заказа
function addOrder($connection, $street, $home, $part, $appt, $comment, $numOrder, $userId, $floor)
{
    /* подготавливаемый запрос, первая стадия: подготовка */
    if (!($stmt = $connection->prepare("INSERT INTO orders (street, house, housing, apartment, commentar, number_order, user_id, floor) VALUES (?,?,?,?,?,?,?,?)"))) {
        echo "Не удалось подготовить запрос: (" . $connection->errno . ") " . $connection->error;
        $stmt = false;
    }
    /* подготавливаемый запрос, вторая стадия: привязка и выполнение */
    if (!$stmt->bind_param("ssssssss", $street, $home, $part, $appt, $comment, $numOrder, $userId, $floor)) {
        echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        $stmt = false;
    }

    if (!$stmt->execute()) {
        echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
        $stmt = false;
    }

    if ($stmt == false) {
        return $stmt;
    } else {
        $stmt = "Спасибо за Ваш заказ!" ;
        return $stmt;
    }
}

//Функция запроса в БД по парраметрам
function requestBd($connection, $baseName, $sql)
{
    $sql = implode(", ", $sql);
    $data = ("SELECT $sql FROM $baseName");
    $result = $connection->query($data);
    if (!$result) {
        die($connection->error);
    }

    $row = $result->fetch_all();
    return $row;
}

//Функция добавления пользователя
function addUsers($connection, $name, $phone, $email)
{
    /* подготавливаемый запрос, первая стадия: подготовка */
    if (!($stmt = $connection->prepare("INSERT INTO users (name, phone, email) VALUES (?, ?, ?)"))) {
        echo "Не удалось подготовить запрос: (" . $connection->errno . ") " . $connection->error;
    }
    /* подготавливаемый запрос, вторая стадия: привязка и выполнение */
    if (!$stmt->bind_param("sss", $name, $phone, $email)) {
        echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
    }
    return;
}

//Функция получаем массив мыла и ид
function EmailAndId($connection, $email)
{
    $data = ("SELECT id, email FROM users WHERE email='$email'");
    $result = $connection->query($data);
    if (!$result) {
        die($connection->error);
    }

    $row = $result->fetch_assoc();
    return $row;
}

//Функция Считаем сколько заказов у пользователя
function CountOrder($connection, $id)
{
    $data = ("SELECT COUNT(orders.id) AS posts_count FROM users LEFT JOIN orders ON (orders.user_id = '$id' && orders.user_id = users.id)");
    $result = $connection->query($data);
    if (!$result) {
        die($connection->error);
    }

    $row = $result->fetch_assoc();
    return $row['posts_count'];
}

//Функция отправки сообщения
function sendOrder($numOrder, $street, $home, $part, $appt, $floor, $connection, $id)
{
    $file = "./order/order-".$numOrder.".txt";
    $current = file_get_contents($file)."\n";
    $current .= "Ваш заказ № - ".$numOrder."\n";
    $current .= "Ваш заказ будет доставлен по адресу:"."\n";
    $current .= "Улица:".$street."\n";
    $current .= "Дом:".$home."\n";
    $current .= "Корпус:".$part."\n";
    $current .= "Квартира:".$appt."\n";
    $current .= "Этаж:".$floor."\n";
    $current .= "Заказ - DarkBeefBurger за 500 рублей, 1 шт \n";

    //Добавляем сообщение благадарности и колличество заказов
    if (CountOrder($connection, $id) <= 1) {
        $tanks = "“Спасибо - это Ваш первый заказ";
    } else {
        $count = CountOrder($connection, $id);
        $tanks = "Спасибо! Это уже ".$count." заказ\n";
    }
    $current .= $tanks;

    // Пишем содержимое обратно в файл
    file_put_contents($file, $current);
}
