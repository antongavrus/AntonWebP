<?php

require_once 'db_config.php';

if(isset($_GET['id'])){
    // получаем id товара
    $delete_pizza_id = intval($_GET['id']);
    // делаем запрос в базу данных на удаление товара с полученным id
    mysqli_query($db, "DELETE FROM `pizzas` WHERE `id`='$delete_pizza_id'");
    // делаем переадресацию
    header('Location: admin_page.php');
}

?>