<?php

namespace Webcube\Hopscotch;

use Webcube\AbstractClass\BasicRate;

class TariffHour extends BasicRate
{
    //    use ServicesGps; передаем доп услуги
    protected $kmRate = 0;
    protected $hcRate = 200;
}
