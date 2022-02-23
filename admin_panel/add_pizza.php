<?php
    // подключаем файл
    require_once 'db_config.php';

    if(isset($_POST['add_pizza_submit'])){
        // привязываем к переменной данные из форм

        $title = $_POST['title'];
        $category = $_POST['category'];
        $image = $_POST['image'];
        $price = $_POST['price'];

        // добавляем запись
        if(!empty($title) && !empty($category) && !empty($image) && !empty($price)){
            mysqli_query($db, "INSERT INTO `pizzas`(`title`, `category`, `image`, `price`) VALUES ('$title', '$category', '$image', '$price')");
            header('Location: admin_page.php');
        } else{
            header('Location: add_pizza.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="add-pizza_form">

        <form action="add_pizza.php" method="post">

                <input type="text" name="title" placeholder="Заголовок">
                <input type="text" name="category" placeholder="Категория">
                <input type="text" name="image" placeholder="Ссылка на изображение">
                <input type="text" name="price" placeholder="Цена">
                <input type="submit" name="add_pizza_submit" class="add-pizza_button" value="Опубликовать">
        </form>

    </div>    
</body>
</html>
