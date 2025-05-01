<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = "info@sentiqx.eu"; // куда ты получаешь сообщение
  $from = $_POST["email"];
  $message = $_POST["message"];
  $subject = "New message from SentiQX";

  $headers = "From: $from\r\n";
  $headers .= "Reply-To: $from\r\n";

  // Отправка тебе
  mail($to, $subject, $message, $headers);

  // Автоответ клиенту
  $reply_subject = "Thank you for contacting SentiQX";
  $reply_message = "Hello,\n\nThank you for reaching out to SentiQX.\nWe have received your message and will get back to you soon.\n\nBest,\nThe SentiQX Team";
  $reply_headers = "From: info@sentiqx.eu\r\n";

  mail($from, $reply_subject, $reply_message, $reply_headers);

  echo "success";
} else {
  echo "error";
}
?>
