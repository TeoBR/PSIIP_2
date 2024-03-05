<?php
define('NUM_E', 2.71828);
echo "Число e равно " . NUM_E;
$num_e1 = NUM_E;
echo "<br>Тип переменной \$num_e1: " . gettype($num_e1);
$num_e1 = (string)$num_e1;
echo "<br>Тип переменной \$num_e1 после преобразования в строку: " . gettype($num_e1) . ", Значение: " . $num_e1;
$num_e1 = (int)$num_e1;
echo "<br>Тип переменной \$num_e1 после преобразования в целое число: " . gettype($num_e1) . ", Значение: " . $num_e1;
$num_e1 = (bool)$num_e1;
echo "<br>Тип переменной \$num_e1 после преобразования в булево значение: " . gettype($num_e1) . ", Значение: " . $num_e1;
?>
