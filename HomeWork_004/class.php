<?php

$tariffBasic = "Basic";
$tariffHour = "Hour";
$tariffDay = "Day";
$tariffStudent = "Student";

class BasicRate
{
    const MIN_AGE = 18;
    const MAX_AGE = 65;
    const NAME_STUDENT_TARIFF = "Student";
    const BONUS_FOR_YOUNG = 0.1;

    protected $kmRate = 10;
    protected $hcRate = 3;

    public function calculation($valueKm, $valueCh, $age, $tariff)
    {
        if ($age < static::MIN_AGE || $age > static::MAX_AGE) {
            throw new \Exception("Вы не подходите по возрасту!");
        }
        if ($age < 22 && $tariff != self::NAME_STUDENT_TARIFF) {
            return ($valueKm * $this->kmRate + $valueCh * $this->hcRate) * self::BONUS_FOR_YOUNG;
        }
        if ($tariff != self::NAME_STUDENT_TARIFF || $age > 25) {
            return $valueKm * $this->kmRate + $valueCh * $this->hcRate;
        }
        if ($age < 22) {
            return ($valueKm * $this->kmRate + $valueCh * $this->hcRate) * self::BONUS_FOR_YOUNG;
        }
        return $valueKm * $this->kmRate + $valueCh * $this->hcRate;







//        //проверка возраста и подставляем формулу расчета согласно возраста
//        if ($age >= 18 && $age <= 65) {
//            if ($tariff == "Student") {//Проверка тарифа студент
//                if ($age <= 22 && $age <= 25) {
//                    $summ = $valueKm * $this->kmRate + $valueCh * $this->hcRate;
//                } elseif ($age >= 18 && $age <= 21) {
//                    $summ = $valueKm * $kmRate + $valueCh * $hcRate;
//                    $proc = $summ * 10 / 100;
//                    $itog = $summ + $proc;
//                } else {
//                    $error = "Тарифом - ".$tariff." могут пользоваться только студенты, вы не студент";
//                }
//            } elseif ($age <= 21) {
//                $summ = $valueKm * $kmRate + $valueCh * $hcRate;
//                $proc = $summ * 10 / 100;
//                $itog = $summ + $proc;
//            } else {
//                $summ = $valueKm * $kmRate + $valueCh * $hcRate;
//            }
//
//        } else {
//            $error = "Вы не подходите по возрасту!";
//        }








    }

    public function arithmetic($kmRate, $hcRate)
    {
        $summ = $valueKm * $kmRate + $valueCh * $hcRate;
    }
}
