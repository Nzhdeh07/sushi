<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_POST) {
    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf-8';
    try {
        // Настройки SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.mail.ru';                        // Хост SMTP Mail.ru
        $mail->Username = 'mut_nyut@mail.ru';              // логин
        $mail->Password = 'rOqXAOVbXAiEotLpG3x6';           // пароль
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Проверка подключения
        $mail->setFrom('mut_nyut@mail.ru', 'Ваше Имя');   // От кого будет уходить письмо
        $mail->addAddress('nzhdeh.baboyan@icloud.com');         // Кому будет уходить письмо

        // Формируем тело письма
        $mail->isHTML(true);
        $mail->Subject = 'Новый заказ';

        $phone = $_POST['phone'];
        $comment = $_POST['comment'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];

        $mail->Body = "
        <p><strong>Товар:</strong> {$product_name}</p>
        <p><strong>Телефон:</strong> {$phone}</p>
        <p><strong>Комментарий:</strong> {$comment}</p>
        <p><strong>Цена:</strong> {$product_price} руб.</p>
        ";

        // Отправляем письмо
        $mail->send();
        http_response_code(200); // Успешно
    } catch (Exception $e) {
        http_response_code(500); // Ошибка отправки письма
    }
}


