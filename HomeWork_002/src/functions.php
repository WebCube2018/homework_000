<?php


//Task 1
function task1($value1, $value2 = false)
{
    if ($value2 == true) {
        if (is_array($value1)) {
            $result = implode(", ", $value1);
            return $result;
        } else {
            return false;
        }
    } else {
        foreach ($value1 as $result) {
            echo "<p>" . $result . "</p>";
        }
    }
}


//Task 2
function task2()
{
    $argList = func_get_args();
    $total = count($argList);
    $counter = 0;
    if ($argList[0] == "+") {
        $arg = true;
    } else {
        $arg = false;
    }

    foreach ($argList as $k => $v) {
        $counter++;
        if ($arg) {
            if ($k > 0) {
                $result = $v;
                $result .= $counter != $total ? $argList[0] : "";
                echo $result;
            }
        } else {
            echo "Error: ";
            break;
        }
    }
    if ($arg) {
        echo " = ";
        echo array_sum($argList);
    } else {
        echo "Первый аргумент переданной функции не определен поставте плюс";
    }
}


//Task 3
function task3($arg1, $arg2)
{
    if (is_int($arg1) && is_int($arg2) && $arg1 <= 10 && $arg2 <= 10) { //Проврека на целое чило и задем лимит на числа
        $table = "<table>";
        for ($i = 1; $i <= $arg1; $i++) {
            $table .= "<tr>";
            for ($c = 1; $c <= $arg2; $c++) {
                if (($i % 2) == 0 && ($c % 2) == 0) {
                    $style = "green";
                } elseif (($i % 2) != 0 && ($c % 2) != 0) {
                    $style = "red";
                } else {
                    $style = "";

                }
                $result = $i*$c;
                $table .= "<td style='background-color: ".$style."'>".$result."</td>";
            }
            $table .= "</tr>";
        }
        $table .= "<table>";
        echo $table;
    } else {
        echo "Error: Числа не целые, или иная ошибка, введите целые числа в функцию";
    }
}


//Task 4
function task4()
{
    echo date('d.m.Y H:i');
}
function task5($date)
{
    $unixTime = strtotime($date);
    echo $unixTime;
}


//Task 5
function task6($str)
{
    $string = "Карл у Клары украл Кораллы";
    echo str_replace($str, " ", $string);
}
function task7($str, $replacement)
{
    $string = "Две бутылки лимонада";
    echo str_replace($str, $replacement, $string);
}


//Task 6
function task8($value)
{
    file_put_contents("test.txt", $value);
}
function task9($content)
{
    echo file_get_contents($content);
}
