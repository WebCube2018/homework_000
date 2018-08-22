<?php

$b = "<br>";

//task 1
echo "<h3>Задание № 1</h3>".$b;
$name = "Андрей";
$age = 24;
echo "Меня зовут: ".$name.$b;
echo "Мне ".$age." года".$b;
echo "\" ! | \\ / ' \"  \\".$b;

//task 2
echo "<h3>Задание № 2</h3>".$b;
define("FIGURES", 80);
define("FELT_PEN", 40);
define("PENCIL", 23);
$x = null;
$x = FIGURES - (FELT_PEN + PENCIL);
$paints = $x;
echo "Красками выполенно ".$paints." рисунков";

//task 3
echo "<h3>Задание № 3</h3>".$b;
//Выставил значения $age от 1 до 100 так как использование случайного генерирования по mt_getrandmax() не целесообразно
$age = mt_rand(1, 100);
if ($age >= 18 && $age <= 65) {
    echo "Вам еще работать и работать";
} elseif ($age > 65) {
    echo "Вам пора на пенсию";
} elseif ($age >= 1 && $age <= 17) {
    echo "Вам ещё рано работать";
} else {
    echo "Неизвестный возраст";
}

//task 4
echo "<h3>Задание № 4</h3>".$b;
$day = mt_rand(1, 10);
switch (true) {
    case ($day >=1 && $day <= 5):
        echo "Это рабочий день";
        break;
    case ($day >=6 && $day <= 7):
        echo "Это выходной день";
        break;
    default:
        echo "Неизвестный день";
}

//task 5
echo "<h3>Задание № 5</h3>".$b;

$bmw = array(
    "model" => "X5",
    "speed" => 120,
    "doors" => 5,
    "year" => 2015,
);
$toyota = array(
    "model" => "Camry",
    "speed" => 239,
    "doors" => 4,
    "year" => 2018,
);
$opel = array(
    "model" => "Astra",
    "speed" => 190,
    "doors" => 3,
    "year" => 2014,
);

$cars = array_merge_recursive($bmw, $toyota, $opel);
$car["bmv"] = $bmw;
$car["toyota"] = $toyota;
$car["opel"] = $opel;

foreach ($car as $key => $item) {
    echo "CAR $key".$b;
    echo $item["model"]." ".$item["speed"]." ".$item["doors"]." ".$item["year"].$b;
}


//task 6
echo "<h3>Задание № 6</h3>".$b;

$table = '<table>';
for ($i = 1; $i <= 10; $i++) {
    $table .= '<tr>';
    for ($c = 1; $c <= 10; $c++) {
        if (($i % 2) == 0 && ($c % 2) == 0) {
            $result = "(".$i*$c.")";
        } elseif (($i % 2) != 0 && ($c % 2) != 0) {
            $result = "[".$i*$c."]";
        } else {
            $result = $i*$c;
        }
        $table .= '<td>'.$result.'</td>';
    }
    $table .= '</tr>';
}
$table .= '<table>';
echo $table;
