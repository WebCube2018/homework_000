<?php
require_once "class.php";


//Вывод инфы
try {
    $tar = new TariffBsic();
    echo $tar->calculation(5, 1471, 23, get_class($tar));
} catch (Exception $error) {
    print "Ошибка!!!: ".$error->getMessage();
}
