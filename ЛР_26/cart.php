<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        .cart-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 300px;
            float: left;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .cart-item p {
            margin: 5px 0;
        }

        .cart-item a {
            display: block;
            text-align: center;
            padding: 5px;
            background-color: #ff0000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .cart-item a:hover {
            background-color: #d90000;
        }

        .checkout-link, .return-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .checkout-link:hover, .return-link:hover {
            background-color: #005f78;
        }

        .return-link {
            margin-left: 10px;
        }
    </style>
</head>
<body>

<?php
// Подключение к базе данных
$servername = "localhost"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных
$dbname = "tv_store"; // Имя базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка удаления товара из корзины
if(isset($_GET['action']) && $_GET['action'] == 'remove_from_cart' && isset($_GET['cart_item_id'])) {
    // Удаляем товар из корзины по его идентификатору в корзине
    $cart_item_id = $_GET['cart_item_id'];
    $sql_remove_from_cart = "DELETE FROM cart WHERE id = $cart_item_id";
    if ($conn->query($sql_remove_from_cart) === TRUE) {
        echo "Товар успешно удален из корзины.";
    } else {
        echo "Ошибка: " . $sql_remove_from_cart . "<br>" . $conn->error;
    }
}

// Обновление цены в корзине
$sql_update_cart_price = "UPDATE cart INNER JOIN tv ON cart.product_id = tv.id SET cart.price = tv.price";
if ($conn->query($sql_update_cart_price) === TRUE) {
    echo "Цены в корзине успешно обновлены.";
} else {
    echo "Ошибка при обновлении цен в корзине: " . $conn->error;
}

// Получение товаров из корзины с ценой
$sql_cart_items = "SELECT cart.id as cart_item_id, tv.*, cart.price as price FROM cart INNER JOIN tv ON cart.product_id = tv.id";
$result_cart_items = $conn->query($sql_cart_items);

// Отображение товаров в корзине
if ($result_cart_items->num_rows > 0) {
    echo "<h2>Корзина</h2>";
    while($row = $result_cart_items->fetch_assoc()) {
        echo "<div class='cart-item'>";
        echo "<p>Марка: " . $row["brand"]. "</p>";
        echo "<p>Модель: " . $row["model"]. "</p>";
        echo "<p>Размер: " . $row["size"]. "</p>";
        echo "<p>Разрешение: " . $row["resolution"]. "</p>";
        echo "<p>Цена: " . $row["price"]. "</p>";
        echo "<a href='?action=remove_from_cart&cart_item_id=" . $row['cart_item_id'] . "'>Удалить из корзины</a>";
        echo "</div>";
    }
    echo "<a href='checkout.php' class='checkout-link'>Перейти к оформлению заказа</a>";
} else {
    echo "Корзина пуста";
}

echo "<a href='script2.php' class='return-link'>Вернуться</a>";

// Закрытие соединения
$conn->close();
?>

</body>
</html>
