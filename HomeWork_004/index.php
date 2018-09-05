<?php
$numberOfSeconds = 1439;
$arrayHours = gmdate('d:H:i', $numberOfSeconds * 60);
$arrayHours = explode(":", $arrayHours);
//if ($arrayHours[3] >)
echo '<pre>';
print_r($arrayHours);
echo '</pre>';
