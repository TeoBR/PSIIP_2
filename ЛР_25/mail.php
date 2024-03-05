<?php
$to = "yourmail@gmail.com";
$tema = "Форма обратной связи на PHP"; 
$message = "Ваше имя: ".$_POST['name']."<br>";
$message .= "E-mail: ".$_POST['email']."<br>"; 
$message .= "Номер телефона: ".$_POST['phone']."<br>"; 
$message .= "Сообщение: ".$_POST['message']."<br>";
$headers = 'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to, $tema, $message, $headers); 
?>