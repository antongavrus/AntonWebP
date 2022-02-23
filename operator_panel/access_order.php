<?php

    use phpmailer\PHPMailer\PHPMailer;

    require_once 'db_config.php';
    require_once 'autoload.php';
    require_once 'phpmailer/phpmailer/src/PHPMailer.php';

	if(isset($_GET['id'])){


        $mail = new PHPMailer;
    
        // Дебаг
        // 0 = off (for production use)
        // 1 = клиентские сообщения
        // 2 = серверные и клиентские сообщения
        //$mail->SMTPDebug = 2;

        $post_id = intval($_GET['id']); // получаем id поста для запроса в базу
        $email_add_query = mysqli_query($db, "SELECT * FROM `orders` WHERE `order_id`='$post_id'");
        $email_add_array = mysqli_fetch_assoc($email_add_query);
        $email_add = $email_add_array['email'];
    
        $mail->isSMTP();
        $mail->Host = 'smtp.yandex.ru'; //gmail: smtp.gmail.com
        $mail->SMTPAuth = true;
        $mail->Username = 'Alanilus@yandex.ru';
        $mail->Password = 'AlAn151515';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setLanguage('ru');
        $mail->setFrom('antonwebpizza@mail.ru', 'Pizza Delivery');
        $mail->addAddress($email_add, 'Order');    //Получатель
    
        $mail->isHTML(true);
    
        $mail->Subject = 'Заказ в пиццерии';
        $mail->Body    = "Ваш заказ принят! Курьер прибудет через 40 минут. Ожидайте!";
        $mail->AltBody = 'AntonWebPizza';
        
        //Отправка сообщения
        if(!$mail->send()) {
            echo 'Ошибка при отправке. Ошибка: ' . $mail->ErrorInfo;
        }

        header('Location: operator_page.php'); // перекидываем на страничку кабинета
        mysqli_query($db, "UPDATE `orders` SET `accessed`= 1, `delivered`= 1 WHERE `order_id`='$post_id'"); // обновляем запись в базе
	}
                                                        
?>