<?php

    $name = $_POST['user-name'];
    $phone = $_POST['user-phone'];
    $mail = $_POST['user-mail'];
    $theme = $_POST['user-theme'];
    $comment = $_POST['comment'];


    $mail_message = '
    <html>
        <head>
            <title>Заявка</title>
        </head>
        <body>
            <h2>Заказ</h2>
            <ul>
                <li>Имя: ' . $name . '</li>
                <li>Телефон: ' . $phone . '</li>
                <li>Email: ' . $mail . '</li>
                <li>Тема: ' . $theme . '</li>
                <li>Сообщение: ' . $comment . '</li>
            </ul>
        </body>
    </html>    
    ';

    $headers = "From: Администратор сайта FutureConsulting <admin@futureconsulting.biz>\r\n".
    "MIME-Version: 1.0" . "\r\n" .
    "Content-type: text/html; charset=UTF-8" . "\r\n";

    $mail = mail('inkatsoy08@gmail.com', 'Заявка', $mail_message, $headers);

    $data = [];

    if ($mail) {
        $data['status'] = "true";
        // $data['mes'] = "Письмо успешно отправлено";
    }else{
        $data['status'] = "false";
        // $data['mes'] = "На сервере произошла ошибка";
    }

    echo json_encode($data);

?>