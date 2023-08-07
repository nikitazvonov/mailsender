<?php

$email = $_POST['email'];
$title = $_POST['title'];
$content = $_POST['content'];

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = 'zvonovnikita42@gmail.com';
$mail->Password = 'ahkloploiunderfinishfinalinboxmessage42';

$mail->setFrom($email);
$mail->addAddress('warfacekem@gmail.com');

$mail->Body = $content;

$mail->send();

echo 'sent';
