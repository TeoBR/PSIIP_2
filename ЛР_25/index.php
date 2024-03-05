<!DOCTYPE html>
<html>
<head>
<title>Форма обратной связи на PHP с отправкой на почту</title>
</head>
<body>
  <h2>Форма обратной связи на PHP</h2>
  <form action="./mail.php" method="post">
  <fieldset>
  <legend>Оставьте сообщение:</legend>
  Ваше имя:
  <input type="text" name="name">
  E-mail:
  <input type="text" name="email">
  Номер телефона:
  <input type="text" name="phone">
  Сообщение:
  Текстовая область может содержать неограниченное количество символов-->
  <textarea rows="10" cols="45" name="message"></textarea>
  <input type="submit" value="Отправить сообщение">
  </fieldset>
  </form>
</body>
</html>