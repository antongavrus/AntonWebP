<?php

    require_once 'db_config.php'; // подключаем  файл с коннектом к БД
	
	if(isset($_GET['id'])){

        $post_id = intval($_GET['id']); // получаем id поста для запроса в базу
        mysqli_query($db, "UPDATE `orders` SET `rejected`= 1 WHERE `order_id`='$post_id'"); // обновляем запись в базе
        //mysqli_query($db, "DELETE FROM `orders` WHERE `order_id`='$post_id' "); // обновляем запись в базе
        header('Location: operator_page.php');
	}
                                                        
?>