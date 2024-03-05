<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Работа с датой и временем</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>

<?php
// Задание 1: Вывод текущей даты, времени и дня недели в различных форматах
$date = date('j. m. Y');
$weekday = date('l');

echo "<p>Дата: $date</p>";
echo "<p id='time'>Время: </p>";
echo "<p id='weekday'>День недели: $weekday</p>";
?>

<!-- Задание 2: Функция для возврата даты с написанием только дня недели на русском -->
<script>
    function showRussianWeekday() {
        const weekdays = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
        const currentWeekday = new Date().getDay();
        alert('Сегодня день недели (по-русски): ' + weekdays[currentWeekday]);
    }
</script>

<!-- Задание 3: Вывод текущей даты и кнопки -->
<button onclick="showRussianWeekday()">Показать день недели (по-русски)</button>

<script>
    function updateClock() {
        const currentTime = new Date().toLocaleTimeString();
        document.getElementById('time').innerHTML = 'Время: ' + currentTime;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>

</body>
</html>
