<?php

namespace Webcube\Hopscotch;

use Webcube\AbstractClass\BasicRate;

class TariffDay extends BasicRate
{
//    use ServicesGps; //передаем доп услуги
//    use ServicesDriver; //передаем доп услуги
    protected $kmRate = 1;
    protected $hcRate = 1000;
}
