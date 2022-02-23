<?php

session_start();

require_once 'db_config.php';

if(isset($_POST['pizza_id'])){

    $user_login = $_SESSION['user']['login'];
    $pizza_id = $_POST['pizza_id'];

    $check_num_cart_sql = "SELECT * FROM `cart` WHERE `user_login` = '$user_login'";
    $check_num_cart_query = mysqli_query($db, $check_num_cart_sql);
    $check_num_cart = mysqli_num_rows($check_num_cart_query);

    if($check_num_cart < 3){
        $add_to_cart_sql = "INSERT INTO `cart`(`user_login`, `pizza_id`, `thickness`, `size`, `num`) VALUES ('$user_login', '$pizza_id', 0, 26, 1)";
        $add_to_cart = mysqli_query($db, $add_to_cart_sql);
    
        header('Location: cart.php');
    }


}

?>