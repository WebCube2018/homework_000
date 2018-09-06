<?php
namespace Webcube\Hopscotch;

use Webcube\AbstractClass\BasicRate;

class TariffBasic extends BasicRate
{
//    use ServicesGps; //передаем доп услуги
    protected $kmRate = 10;
    protected $hcRate = 3;
}
