<?php

namespace Webcube\Hopscotch;

trait ServicesDriver
{
    public function calculation($valueKm, $valueCh, $age, $tariff)
    {
        $itog =  parent::calculation($valueKm, $valueCh, $age, $tariff);
        return self::PRICE_DRIVE + $itog;
    }
}
