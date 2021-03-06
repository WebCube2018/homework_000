<?php
namespace Webcube\AbstractClass;

abstract class BasicRate
{
    const MIN_AGE = 18;
    const MAX_AGE = 65;
    const PRICE_GPS = 15;
    const PRICE_DRIVE = 100;
    const BONUS_FOR_YOUNG = 0.1;
    const NAME_STUDENT_TARIFF = "TariffStudent";
    const DIR_CLASS = "Webcube\Hopscotch\\";
    const NAME_HOUR_TARIFF = "TariffHour";
    const NAME_DAY_TARIFF = "TariffDay";
    const HOURS_VALUE = 60;
    const DAY_MINUTE_VALUE = 1470;//Допустимая норма до округления по дневному тарифу
    const HOURS_MINUTE_VALUE = 1440;//Колличество минут в сутки
    const DAY_VALUE = 24;//Колличество часов в сутки
    const NAME_SERVICE = "gps";

    protected $kmRate;
    protected $hcRate;

    public function calculation($valueKm, $valueCh, $age, $tariff)
    {
        //Вырежим путь по классу оставим название тарифа
        $tariff = str_replace(self::DIR_CLASS, "", $tariff);

        //Округление по часовому тарифу
        if ($tariff == self::NAME_HOUR_TARIFF && $valueCh < self::HOURS_VALUE) {
            $valueCh = 60;//Округлем до 60 минут если отездил меньше 60 минут
        } elseif ($tariff == self::NAME_HOUR_TARIFF && $valueCh > self::HOURS_VALUE) {
            $value = ($valueCh - self::HOURS_VALUE);
            $valueCh = (self::HOURS_VALUE - $value) + $valueCh;
        }

        //Округление по суточному тарифу
        if ($tariff == self::NAME_DAY_TARIFF && $valueCh <= self::DAY_MINUTE_VALUE) {
            $valueCh = 1440;//Присваеваем минуты в сутках если меньше суток прошло а точнее 24:30
        } elseif ($tariff == self::NAME_DAY_TARIFF && $valueCh > self::DAY_MINUTE_VALUE) {
            $value = ($valueCh - self::HOURS_MINUTE_VALUE);
            $valueCh = ((self::HOURS_MINUTE_VALUE - $value) + $valueCh) / self::HOURS_VALUE;
            $valueCh = $valueCh / self::DAY_VALUE;//Получаем колличество суток
        }

        //Ошибка по возрасту
        if ($age < static::MIN_AGE || $age > static::MAX_AGE) {
            throw new \Exception("Вы не подходите по возрасту!");
        }
        //Если это студент и ему меньше 22 но больше 18 лет
        if ($age < 22 && $tariff == self::NAME_STUDENT_TARIFF) {
            $sum = $valueKm * $this->kmRate + $valueCh * $this->hcRate;
            return $sum + $sum * self::BONUS_FOR_YOUNG;
        }
        //Если это студент и ему больше 25
        if ($tariff == self::NAME_STUDENT_TARIFF && $age > 25) {
            throw new \Exception("Вы не подходите по возрасту из-за выбранного тарифа - ".$tariff);
        }
        //Если клиенту меньше 22 лет добавим бонус
        if ($age < 22) {
            $sum = $valueKm * $this->kmRate + $valueCh * $this->hcRate;
            return $sum + $sum * self::BONUS_FOR_YOUNG;
        }
        //Тариф по умолчанию
        return $valueKm * $this->kmRate + $valueCh * $this->hcRate.$tariff;
    }
}
