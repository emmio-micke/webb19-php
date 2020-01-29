<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail = new PHPMailer();

$mail->setFrom('mikael.olsson@emmio.se', 'Mikael Olsson');
$mail->addReplyTo('mikael.olsson@emmio.se', 'Mikael Olsson');

$mail->addAddress('mikael.olsson@emmio.se', 'Mikael Olsson');

$mail->Subject = 'Detta är ett testmail';

$mail->Body = "Line 1" . PHP_EOL . "Line 2" . PHP_EOL . "Line 3";

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
