<?php

session_start();

require_once 'db_config.php';

if(isset($_POST['send_order_action'])){
    if(isset($_SESSION['user'])){

        $user_login = $_SESSION['user']['login'];
        $user_email = $_SESSION['user']['email'];
        $select_cart_sql = "SELECT * FROM `cart` WHERE `user_login`='$user_login'";
        $select_cart = mysqli_query($db, $select_cart_sql);

        foreach($select_cart as $order){

            $pizza_id = $order['pizza_id'];
            $thickness = $order['thickness'];
            $size = $order['size'];

            $send_order_sql = "INSERT INTO `orders`(`pizza_id`, `email`, `size`, `thickness`, `accessed`, `rejected`, `delivered`) VALUES ('$pizza_id', '$user_email', '$size', '$thickness', 0, 0, 0)";
            $send_order = mysqli_query($db, $send_order_sql);

            $delete_cart_sql = "DELETE FROM `cart` WHERE `user_login`='$user_login'";
            $delete_cart = mysqli_query($db, $delete_cart_sql);

            header('Location: order_message.html');

        }

    }

}




?>