<?php

function calculateZ($x, $y) {
    $z = sqrt(abs($x ** 2 - 0.1) / ($x ** 2 + 0.1)) + ($x + $y ** 3) / log(1 + $x ** 2, 8);

    return $z;
}

$x_value = 2.5;
$y_value = 1.2;

$result = calculateZ($x_value, $y_value);

echo "Результат расчета по формуле: $result";
?>
