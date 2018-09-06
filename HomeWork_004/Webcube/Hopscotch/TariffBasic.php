<?php
namespace Webcube\Hopscotch;

use Webcube\AbstractClass\BasicRate;

class TariffBasic extends BasicRate
{
    protected $kmRate = 10;
    protected $hcRate = 3;

    use ServicesDriver;
}
