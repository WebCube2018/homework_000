<?php

$b = "<br>";

//task 1
echo "<h3>Задача 1</h3>".$b;
$name = "Андрей";
$age = 24;
echo "Меня зовут: ".$name.$b;
echo "Мне ".$age." лет".$b;
echo "\" ! | \\ / ' \"  \\".$b;

//task 2
echo "<h3>Задача 2</h3>".$b;
define("FIGURES", 80);
define("FELT_PEN", 40);
define("PENCIL", 23);
$x = null;
$x = FIGURES - (FELT_PEN + PENCIL);
$paints = $x;
echo "Красками выполенно ".$paints." рисунков";

//task 3
echo "<h3>Задача 3</h3>".$b;
$age = mt_rand(1, 100);
if (($age >= 18) && ($age <= 65)) {
    echo "Вам еще работатьи работать";
    if ($age > 65) {
        echo "Вам пора на пенсию";
    }
} elseif (($age >= 1) && ($age <= 17)) {
    echo "Вам ещё рано работать";
} else {
    echo "Неизвестный возраст";
}
