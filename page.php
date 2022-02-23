<?php

    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: login_page.html');
    }

    require_once 'db_config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="functions.js"></script>
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
                <a href="/cart.php">
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
        <div class="container">
            <div class="content_top">

                <div class="categories">
                    <ul class="categories_ul">
                        <li class="ct_item active" id="1">Все</li>
                        <li class="ct_item" id="2">Мясные</li>
                        <li class="ct_item" id="3">Вегетарианские</li>
                        <li class="ct_item" id="4">Гриль</li>
                        <li class="ct_item" id="5">Острые</li>
                        <li class="ct_item" id="6">Закрытые</li>
                    </ul>
                </div>

                <div class="sort">
                    <div class="sort_label">
                        <svg class="" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 5C10 5.16927 9.93815 5.31576 9.81445 5.43945C9.69075 5.56315 9.54427 5.625 9.375 5.625H0.625C0.455729 5.625 0.309245 5.56315 0.185547 5.43945C0.061849 5.31576 0 5.16927 0 5C0 4.83073 0.061849 4.68424 0.185547 4.56055L4.56055 0.185547C4.68424 0.061849 4.83073 0 5 0C5.16927 0 5.31576 0.061849 5.43945 0.185547L9.81445 4.56055C9.93815 4.68424 10 4.83073 10 5Z" fill="#2C2C2C"></path></svg>
                        <b>Сортировка по:</b><span>популярности</span>
                    </div>
                </div>

            </div>

            <h2 class="content_title">Все Пиццы</h2>

            <div class="content_items">

            <?php

                $all_pizzas_sql = "SELECT * FROM `pizzas`";
                $all_pizzas = mysqli_query($db, $all_pizzas_sql);

                foreach($all_pizzas as $pizza){

                $id = $pizza['id'];
                $title = $pizza['title'];
                $price = $pizza['price'];
                $img = $pizza['image'];

            ?>
        
                <div class="pizza_card">
                    <img src="<?=$img;?>" alt="" class="pizza-card_image">
                    <h4 class="pizza-card_title"><?=$title;?></h4>

                    <div class="pizza-card_selector">
                        <ul>
                            <li class="thickness active">тонкое</li>
                            <li class="thickness">традиционное</li>
                        </ul>
                        <ul>
                            <li class="size active" id="26">26</li>
                            <li class="size" id="30">30</li>
                            <li class="size" id="40">40</li>
                        </ul>
                    </div>

                    <div class="pizza-card_bottom">
                        <div class="pizza-card_price">от <?=$price;?></div>
                        <button id="<?=$id;?>" class="button content--button button--add button--outline add-pizza_sub"> <!--button content--button button--add button--outline -->
                            <form action="add_pizza_result.php" method="post">
                                <input type="hidden" value="<?=$id;?>" name="pizza_id">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.8 4.8H7.2V1.2C7.2 0.5373 6.6627 0 6 0C5.3373 0 4.8 0.5373 4.8 1.2V4.8H1.2C0.5373 4.8 0 5.3373 0 6C0 6.6627 0.5373 7.2 1.2 7.2H4.8V10.8C4.8 11.4627 5.3373 12 6 12C6.6627 12 7.2 11.4627 7.2 10.8V7.2H10.8C11.4627 7.2 12 6.6627 12 6C12 5.3373 11.4627 4.8 10.8 4.8Z" fill="white"></path></svg><input type="submit" value="Добавить" id="add">
                            </form>
                        </button>
                    </div>
                </div>

                <?php } // конец foreach ?>

            </div>
        </div>
    </div>
</div>
</body>
</html>