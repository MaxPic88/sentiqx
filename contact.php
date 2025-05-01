<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Настройки SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.nl.zone.eu'; // например, smtp.zoho.com, smtp.office365.com
    $mail->SMTPAuth = true;
    $mail->Username = 'info@sentiqx.eu';
    $mail->Password = 'Mak5imka21!!';
    $mail->SMTPSecure = 'tls'; // или ssl
    $mail->Port = 587; // или 465 для ssl

    // От кого и кому
    $mail->setFrom('info@sentiqx.eu', 'SentiQX Site');
    $mail->addAddress('youremail@example.com'); // получатель

    // Тема и тело письма
    $mail->isHTML(true);
    $mail->Subject = 'New message from SentiQX';
    $mail->Body    = 'Email: ' . $_POST['email'] . '<br>Message:<br>' . nl2br($_POST['message']);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
?>
