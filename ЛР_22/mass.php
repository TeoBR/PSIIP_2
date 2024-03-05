<?php

$foodProducts = array(
    'хлеб' => 5000,
    'молоко' => 800,
    'сметана' => 7000
);

echo "Стоимость молока: " . $foodProducts['молоко'] . "<br>";

arsort($foodProducts);

echo "Отсортированный массив в порядке убывания стоимости:<br>";
foreach ($foodProducts as $product => $price) {
    echo "$product: $price<br>";
}
?>
