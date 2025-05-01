<?php
ob_start(); // буферизация вывода

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

    // ОТЛАДКА
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';

    // От кого и кому
    $mail->setFrom('info@sentiqx.eu', 'SentiQX Website');
    $mail->addAddress('sentiqx@gmail.com'); // <-- замени на свою почту

    // Письмо
    $mail->isHTML(true);
    $mail->Subject = 'New message from SentiQX';
    $mail->Body = 'Email: ' . $_POST['email'] . '<br><br>Message:<br>' . nl2br($_POST['message']);

    $mail->send();
    echo '✅ Message sent successfully.';
} catch (Exception $e) {
    echo "❌ Failed to send. Error: {$mail->ErrorInfo}";
}

// Показываем debug log
echo '<hr><h3>📄 SMTP Debug Output:</h3>';
echo nl2br(ob_get_clean());
?>
