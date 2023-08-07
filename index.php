<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Mailsender</title>
</head>
<body>
    <section>
        <article>
            <h1>Mailsender</h1>
            <div>
                <form action="index.php" method="POST">
                    <label for="title">Адрес электронной почты</label>
                    <input type="text" name="email" placeholder="Введите адрес электронной почты">

                    <label for="title">Тема письма</label>
                    <input type="text" name="title" placeholder="Введите тему письма">

                    <label for="content">Содержание письма</label>
                    <textarea name="content" cols="30" rows="10" placeholder="Содержание письма"></textarea>

                    <input type="submit" name="submit">
                </form>
            </div>
        </article>
    </section>
</body>
</html>

<?php

$email = $_POST['email'];
$title = $_POST['title'];
$content = $_POST['content'];

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = 'nikita@example.com';
$mail->Password = 'password';

$mail->setFrom($email);
$mail->addAddress('me@example.com');

$mail->Subject = $title;
$mail->Body = $content;

$mail->send();

header('Location: sent.html');

?>