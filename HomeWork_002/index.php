<?php
require("src/functions.php");

$task1String = array("Hello world!", "Main mame: Andrei", "Last name: Donets");

$b = "<br>";

//task 1
echo "<h3>Задание № 1</h3>".$b;
print_r(task1($task1String, true));

//task 2
echo "<h3>Задание № 2</h3>".$b;
task2("+", 1, 5, 7, 9);

//task 3
echo "<h3>Задание № 3</h3>".$b;
task3(10, 8);


//task 4
echo "<h3>Задание № 4</h3>".$b;
task4();
echo $b;
task5("24.02.2016 00:00:00");


//task 5
echo "<h3>Задание № 5</h3>".$b;
task6("К");
echo $b;
task7("Две", "Три");


//task 6
echo "<h3>Задание № 6</h3>".$b;
task8("Hello again!");
echo $b;
task9("test.txt");
