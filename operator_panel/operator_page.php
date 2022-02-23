<?php

session_start();

if(!isset($_SESSION['user'])){
    header('Location: /operator_login_page.html');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="operator_css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="container">
            <a href="/page.php" class="a_hl">
                    <div class="header_logo">
                        <img width="38" src="https://react-pizza-test.herokuapp.com/static/media/pizza-logo.f3327011.svg" alt="Pizza logo">
                        <div>
                            <h1>AntonWebPizza</h1>
                            <p>Самая вкусная пицца во вселенной</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php require_once 'operator_page_list.php'; // вставляем таблицу с заказами ?>
    </div>
</body>
</html>