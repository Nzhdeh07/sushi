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
        $mail->Host = 'smtp.mail.ru';
        $mail->Username = 'mut_nyut@mail.ru';
        $mail->Password = 'rOqXAOVbXAiEotLpG3x6';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Проверка подключения
        $mail->setFrom('mut_nyut@mail.ru', 'Ваше Имя');
        $mail->addAddress('nzhdeh.baboyan@icloud.com');

        // Формируем тело письма
        $mail->isHTML(true);
        $mail->Subject = 'Новый заказ';

        $phone = $_POST['phone'];
        $comment = $_POST['comment'];
        $product_total_price = $_POST['total_price'];

        // Обработка товаров
        $product_names = $_POST['product_name'];
        $product_quantities = $_POST['product_quantity'];
        $product_prices = $_POST['product_price']; // Исправлено на `product_prices`

        $products_info = '';
        for ($i = 0; $i < count($product_names); $i++) {
            $products_info .= "<p><strong>Товар:</strong> {$product_names[$i]}, <strong>Количество:</strong> {$product_quantities[$i]}, <strong>Цена:</strong> {$product_prices[$i]}</p>";
        }

        $mail->Body = "
        <p><strong>Телефон:</strong> {$phone}</p>
        <p><strong>Комментарий:</strong> {$comment}</p>
        {$products_info}
         <p><strong>Общая сумма заказа:</strong> {$product_total_price}</p>

        ";

        // Отправляем письмо
        $mail->send();
        http_response_code(200); // Успешно
    } catch (Exception $e) {
        http_response_code(500); // Ошибка отправки письма
    }
}



