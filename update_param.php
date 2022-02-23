<?php

session_start();

require_once 'db_config.php';

    if(isset($_SESSION['user'])){
        $login = $_SESSION['user']['login'];
        if(isset($_POST['thickness']) && isset($_POST['pizza_id'])){
            $thickness = $_POST['thickness'];
            $pizza_id = $_POST['pizza_id'];
            
            $update_sql = "UPDATE `cart` SET `thickness`='$thickness' WHERE `pizza_id` = '$pizza_id' AND `user_login`='$login'";
            $update_query = mysqli_query($db, $update_sql);
        }
        if(isset($_POST['size']) && isset($_POST['pizza_id'])){
            $size = $_POST['size'];
            $pizza_id = $_POST['pizza_id'];
    
            $update_sql = "UPDATE `cart` SET `size`='$size' WHERE `pizza_id` = '$pizza_id' AND `user_login`='$login'";
            $update_query = mysqli_query($db, $update_sql);
        }
        if(isset($_POST['new_num']) && isset($_POST['pizza_id'])){
            $new_num = $_POST['new_num'];
            $pizza_id = $_POST['pizza_id'];
    
            $update_sql = "UPDATE `cart` SET `num`='$new_num' WHERE `pizza_id` = '$pizza_id' AND `user_login`='$login'";
            $update_query = mysqli_query($db, $update_sql);
        }

        if(isset($_POST['delete_order_action']) && isset($_POST['pizza_id'])){
            $pizza_id = $_POST['pizza_id'];

            $delete_sql = "DELETE FROM `cart` WHERE `pizza_id`='$pizza_id' AND `user_login`='$login'";
            $delete_query = mysqli_query($db, $delete_sql);

        }

        if(isset($_POST['delete_orders_action'])){

            $delete_sql = "DELETE FROM `cart` WHERE 1";
            $delete_query = mysqli_query($db, $delete_sql);

        }

        header('Location: cart.php');
    }

?>