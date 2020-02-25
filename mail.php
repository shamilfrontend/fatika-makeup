<?php
// очистка полей
function clear_data($data) {
  $data = trim( htmlspecialchars( $data ) );
  return $data;
}

// данные администратора
$recepient_client = "fatika-makeup@yandex.ru";
$recepient_admin = "shoma.alisultanov@yandex.ru";
$site_name = "fatika-makeup.ru";

// Принимаемые данные с формы
$name = clear_data($_POST["order-name"]);
$email = clear_data($_POST["order-email"]);
$phone = clear_data($_POST["order-phone"]);
$comment = clear_data($_POST["order-comment"]);

// создаем сообщение
$message = "<table width='100%' border='1px' style='border-collapse: collapse'>
<tr>
<td style='padding: 10px;'>Имя:</td>
<td style='padding: 10px;'>$name</td>
</tr>
<tr>
<td style='padding: 10px;'>Email:</td>
<td style='padding: 10px;'>$email</td>
</tr>
<tr>
<td style='padding: 10px;'>Телефон:</td>
<td style='padding: 10px;'>$phone</td>
</tr>
<tr>
<td style='padding: 10px;'>Комментарий:</td>
<td style='padding: 10px;'>$comment</td>
</tr>
</table>";

// Заголовок письма
$page_title = "Новая заявка с сайта \"$site_name\"";

// отправляем
mail($recepient_client, $page_title, $message, "Content-type: text/html; charset=\"utf-8\"\n From: $recepient_client");
mail($recepient_admin, $page_title, $message, "Content-type: text/html; charset=\"utf-8\"\n From: $recepient_admin");

?>
