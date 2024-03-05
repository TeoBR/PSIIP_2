<?php
$s1 = "Муравьёва";
$s2 = "переулок Южный 5";

$lengthS1 = mb_strlen($s1);

$concatenatedStrings = $s1 . ' ' . $s2;

$upperCaseS2 = mb_strtoupper($s2);

echo "Длина строки s1: $lengthS1<br>";
echo "Сцепленные строки: $concatenatedStrings<br>";
echo "Строка s2 в верхнем регистре: $upperCaseS2";
?>
