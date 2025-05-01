<?php
ob_start(); // Включаем буферизацию вывода

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.nl.zone.eu';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@sentiqx.eu';
    $mail->Password = 'Mak5imka21!!';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // ВКЛЮЧАЕМ ОТЛАДКУ
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';

    $mail->setFrom('info@sentiqx.eu', 'SentiQX Site');
    $mail->addAddress('youremail@example.com');

    $mail->isHTML(true);
    $mail->Subject = 'New message from SentiQX';
    $mail->Body    = 'Email: ' . $_POST['email'] . '<br>Message:<br>' . nl2br($_POST['message']);

    $mail->send();
    echo '✅ Message has been sent';
} catch (Exception $e) {
    echo "❌ Message could not be sent. Error: {$mail->ErrorInfo}";
}

// ПОКАЗЫВАЕМ ВЕСЬ ОТЛАДОЧНЫЙ ВЫВОД
echo '<hr><h3>Debug log:</h3>';
echo nl2br(ob_get_clean());
?>
