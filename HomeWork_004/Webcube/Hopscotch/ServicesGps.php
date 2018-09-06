<?php

namespace Webcube\Hopscotch;

trait ServicesGps
{
    public function calculation($valueKm, $valueCh, $age, $tariff)
    {
        $itog =  parent::calculation($valueKm, $valueCh, $age, $tariff);
        //переводим часы в минуты
        $valueCh = $valueCh / 60;
        $valueCh = round($valueCh, 0, PHP_ROUND_HALF_UP);
        return $valueCh * self::PRICE_GPS + $itog;
    }
}
