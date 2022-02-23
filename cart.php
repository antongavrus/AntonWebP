<?php

    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: login_page.html');
    }

    require_once 'db_config.php';

    $user_login = $_SESSION['user']['login'];
    $select_cart_sql = "SELECT * FROM `cart` WHERE `user_login`='$user_login'";
    $select_cart = mysqli_query($db, $select_cart_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="cart_param.js"></script>
    <title>Document</title>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="container">
            <a href="/page.php">
                <div class="header_logo">
                    <img width="38" src="https://react-pizza-test.herokuapp.com/static/media/pizza-logo.f3327011.svg" alt="Pizza logo">
                    <div>
                        <h1>AntonWebPizza</h1>
                        <p>Самая вкусная пицца во вселенной</p>
                    </div>
                </div>
            </a>

            <div class="header_cart">
                <a href="/cart">
                    <button class="button header--button button--cart">
                        <span>0 ₽</span>
                        <div class="button_delimiter"></div>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.33333 16.3333C7.06971 16.3333 7.66667 15.7364 7.66667 15C7.66667 14.2636 7.06971 13.6667 6.33333 13.6667C5.59695 13.6667 5 14.2636 5 15C5 15.7364 5.59695 16.3333 6.33333 16.3333Z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M14.3333 16.3333C15.0697 16.3333 15.6667 15.7364 15.6667 15C15.6667 14.2636 15.0697 13.6667 14.3333 13.6667C13.597 13.6667 13 14.2636 13 15C13 15.7364 13.597 16.3333 14.3333 16.3333Z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M4.78002 4.99999H16.3334L15.2134 10.5933C15.1524 10.9003 14.9854 11.176 14.7417 11.3722C14.4979 11.5684 14.1929 11.6727 13.88 11.6667H6.83335C6.50781 11.6694 6.1925 11.553 5.94689 11.3393C5.70128 11.1256 5.54233 10.8295 5.50002 10.5067L4.48669 2.82666C4.44466 2.50615 4.28764 2.21182 4.04482 1.99844C3.80201 1.78505 3.48994 1.66715 3.16669 1.66666H1.66669" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <span>0</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container container--cart">


        <?php 

            if(mysqli_num_rows($select_cart) > 0){


        ?>

            <div class="cart">
                <div class="cart_top">
                    <h2 class="content_title">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.33333 16.3333C7.06971 16.3333 7.66667 15.7364 7.66667 15C7.66667 14.2636 7.06971 13.6667 6.33333 13.6667C5.59695 13.6667 5 14.2636 5 15C5 15.7364 5.59695 16.3333 6.33333 16.3333Z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M14.3333 16.3333C15.0697 16.3333 15.6667 15.7364 15.6667 15C15.6667 14.2636 15.0697 13.6667 14.3333 13.6667C13.597 13.6667 13 14.2636 13 15C13 15.7364 13.597 16.3333 14.3333 16.3333Z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M4.78002 4.99999H16.3334L15.2134 10.5933C15.1524 10.9003 14.9854 11.176 14.7417 11.3722C14.4979 11.5684 14.1929 11.6727 13.88 11.6667H6.83335C6.50781 11.6694 6.1925 11.553 5.94689 11.3393C5.70128 11.1256 5.54233 10.8295 5.50002 10.5067L4.48669 2.82666C4.44466 2.50615 4.28764 2.21182 4.04482 1.99844C3.80201 1.78505 3.48994 1.66715 3.16669 1.66666H1.66669" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        Корзина
                    </h2>
                    <div class="cart_clear">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.5 5H4.16667H17.5" stroke="#B6B6B6" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.66663 5.00001V3.33334C6.66663 2.89131 6.84222 2.46739 7.15478 2.15483C7.46734 1.84227 7.89127 1.66667 8.33329 1.66667H11.6666C12.1087 1.66667 12.5326 1.84227 12.8451 2.15483C13.1577 2.46739 13.3333 2.89131 13.3333 3.33334V5.00001M15.8333 5.00001V16.6667C15.8333 17.1087 15.6577 17.5326 15.3451 17.8452C15.0326 18.1577 14.6087 18.3333 14.1666 18.3333H5.83329C5.39127 18.3333 4.96734 18.1577 4.65478 17.8452C4.34222 17.5326 4.16663 17.1087 4.16663 16.6667V5.00001H15.8333Z" stroke="#B6B6B6" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.33337 9.16667V14.1667" stroke="#B6B6B6" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M11.6666 9.16667V14.1667" stroke="#B6B6B6" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <span class="cart_clear_span">Очистить корзину</span>
                    </div>
                </div>


                <div class="content_items">

                    <?php

                        foreach($select_cart as $cart_pizza){

                            $id = $cart_pizza['pizza_id'];
                            $thickness = $cart_pizza['thickness'];
                            $size = $cart_pizza['size'];
                            $num = $cart_pizza['num'];

                            $orders_num_query = mysqli_query($db, "SELECT * FROM `cart` WHERE `user_login`='$user_login'");
                            $orders_num = mysqli_num_rows($orders_num_query);

                            $all_num = $orders_num * $num;

                            $pizzas_array = mysqli_query($db, "SELECT * FROM `pizzas` WHERE `id`='$id'");
                            $pizzas = mysqli_fetch_assoc($pizzas_array);
                            $title = $pizzas['title'];
                            $price = $pizzas['price'];

                    ?>

                    <div class="cart_item"">
                        <div class="cart-item_img">
                            <img class="pizza-block_image" src="https://dodopizza-a.akamaihd.net/static/Img/Products/Pizza/ru-RU/b750f576-4a83-48e6-a283-5a8efb68c35d.jpg" alt="Pizza">
                        </div>
                        <div class="cart-item_info">
                            <h3><?=$title;?></h3>
                            <div class="info_wrapper">
                            <div class="info_thickness"><p data-id="0" class="thickness_fl <?php if($thickness == 0){echo "active";} ?>" id="id_<?=$id;?>_var_0">тонкое</p> <p data-id="1" class="thickness_fl <?php if($thickness == 1){echo "active";} ?>" id="id_<?=$id;?>_var_1">традиционное</p></div><div class="info_size"><p class="size_fl <?php if($size == 26){echo "active";} ?>" id="id_<?=$id;?>_var_26">26</p><p class="size_fl <?php if($size == 30){echo "active";} ?>" id="id_<?=$id;?>_var_30">30</p><p class="size_fl <?php if($size == 40){echo "active";} ?>" id="id_<?=$id;?>_var_40">40</p></div>
                            </div>
                        </div>
                        <div class="cart-item_count">
                            <div class="button button--outline button--circle cart_item-count-minus" id="minus_<?=$id;?>_num_<?=$num;?>">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.92001 3.84V5.76V8.64C5.92001 9.17016 5.49017 9.6 4.96001 9.6C4.42985 9.6 4.00001 9.17016 4.00001 8.64L4 5.76L4.00001 3.84V0.96C4.00001 0.42984 4.42985 0 4.96001 0C5.49017 0 5.92001 0.42984 5.92001 0.96V3.84Z" fill="#EB5A1E"></path><path d="M5.75998 5.92001L3.83998 5.92001L0.959977 5.92001C0.429817 5.92001 -2.29533e-05 5.49017 -2.29301e-05 4.96001C-2.2907e-05 4.42985 0.429817 4.00001 0.959977 4.00001L3.83998 4L5.75998 4.00001L8.63998 4.00001C9.17014 4.00001 9.59998 4.42985 9.59998 4.96001C9.59998 5.49017 9.17014 5.92001 8.63998 5.92001L5.75998 5.92001Z" fill="#EB5A1E"></path></svg>
                            </div>

                            <b class="pizza_num_cart" id="id_<?=$id;?>"><?=$num;?></b> <!--КОЛИЧЕСТВО ПИЦЦ НА КОНКРЕТНОМ ЗАКАЗЕ-->

                            <div class="button button--outline button--circle cart_item-count-plus" id="plus_<?=$id;?>_num_<?=$num;?>">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.92001 3.84V5.76V8.64C5.92001 9.17016 5.49017 9.6 4.96001 9.6C4.42985 9.6 4.00001 9.17016 4.00001 8.64L4 5.76L4.00001 3.84V0.96C4.00001 0.42984 4.42985 0 4.96001 0C5.49017 0 5.92001 0.42984 5.92001 0.96V3.84Z" fill="#EB5A1E"></path><path d="M5.75998 5.92001L3.83998 5.92001L0.959977 5.92001C0.429817 5.92001 -2.29533e-05 5.49017 -2.29301e-05 4.96001C-2.2907e-05 4.42985 0.429817 4.00001 0.959977 4.00001L3.83998 4L5.75998 4.00001L8.63998 4.00001C9.17014 4.00001 9.59998 4.42985 9.59998 4.96001C9.59998 5.49017 9.17014 5.92001 8.63998 5.92001L5.75998 5.92001Z" fill="#EB5A1E"></path></svg>
                            </div>                            
                        </div>
                        <div class="cart-item_price">
                            <b class="price_self" id="id_<?=$id;?>_num_<?=$num;?>"><?=$price;?> ₽</b>
                        </div>
                        <div class="cart-item_remove">
                            <button class="button button--circle button--outline delete" id="<?=$id;?>">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.92001 3.84V5.76V8.64C5.92001 9.17016 5.49017 9.6 4.96001 9.6C4.42985 9.6 4.00001 9.17016 4.00001 8.64L4 5.76L4.00001 3.84V0.96C4.00001 0.42984 4.42985 0 4.96001 0C5.49017 0 5.92001 0.42984 5.92001 0.96V3.84Z" fill="#EB5A1E"></path><path d="M5.75998 5.92001L3.83998 5.92001L0.959977 5.92001C0.429817 5.92001 -2.29533e-05 5.49017 -2.29301e-05 4.96001C-2.2907e-05 4.42985 0.429817 4.00001 0.959977 4.00001L3.83998 4L5.75998 4.00001L8.63998 4.00001C9.17014 4.00001 9.59998 4.42985 9.59998 4.96001C9.59998 5.49017 9.17014 5.92001 8.63998 5.92001L5.75998 5.92001Z" fill="#EB5A1E"></path></svg>
                            </button>
                        </div>
                    </div>

                <?php } // конец foreach ?>

                </div>


                <div class="cart_bottom">
                    <div class="cart-bottom_details">
                        <span>
                            Добавленные Товары: <b class="pizza_num_all_cart" id="<?=$orders_num;?>"><?=$orders_num;?></b> <!--КОЛИЧЕСТВО ПИЦЦ В ОБЩЕЙ СЛОЖНОСТИ-->
                        </span>
                        <span>
                            Сумма заказа: <b>803 ₽</b>
                        </span>
                    </div>
                    <div class="cart-bottom_buttons">
                        <a href="/page.php" class="button button--outline button--add go-back-btn">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 13L1 6.93015L6.86175 1" stroke="#D3D3D3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            <p><span>Вернуться назад</span></p>
                        </a>

                        <button class="button pay-btn">
                            <span>Оплатить</span>
                        </button>
                    </div>
                </div>
            </div>

            <?php } else { ?>



                <div class="cart cart--empty">
                    <h2>Корзина пустая <i>😕</i></h2>
                    <p>Вероятней всего, вы не заказывали ещё пиццу.
                    <br>Для того, чтобы заказать пиццу, перейди на главную страницу.</p>
                    <img src="https://react-pizza-test.herokuapp.com/static/media/empty-cart.ceb2faf0.png" alt="">
                    <a class="button button--black" href="/page.php"><span>Вернуться назад</span></a>
                </div>




            <?php } // конец else ?>





        </div>
    </div>
</div>

</body>
</html>