<?php

//Подключаем Абстрактный класс
require_once "Webcube/AbstractClass/BasicRate.php";

//Подключаем дополнительные услуги
require_once "Webcube/Hopscotch/ServicesGps.php";
require_once "Webcube/Hopscotch/ServicesDriver.php";

//Подключаем тарифы
require_once "Webcube/Hopscotch/TariffBasic.php";
require_once "Webcube/Hopscotch/TariffStudent.php";
require_once "Webcube/Hopscotch/TariffHour.php";
require_once "Webcube/Hopscotch/TariffDay.php";


use Webcube\Hopscotch\TariffBasic;
use Webcube\Hopscotch\TariffStudent;
use Webcube\Hopscotch\TariffHour;
use Webcube\Hopscotch\TariffDay;

//Вывод инфы
try {
    $tar = new TariffStudent();//Пишем тариф
    echo $tar->calculation(10, 1471, 21, get_class($tar));
} catch (Exception $error) {
    print "Ошибка!!!: ".$error->getMessage();
}
