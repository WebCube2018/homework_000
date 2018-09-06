<?php

namespace Webcube\Hopscotch;

use Webcube\AbstractClass\BasicRate;

class TariffStudent extends BasicRate
{
    //    use ServicesGps; передаем доп услуги
    protected $kmRate = 4;
    protected $hcRate = 1;
}
