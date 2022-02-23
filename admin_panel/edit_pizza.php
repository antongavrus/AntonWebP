<?php
    
    require_once 'db_config.php'; // подключаем  файл с коннектом к БД

    $post_id = intval($_GET['id']); // получаем id поста для запроса в базу
    $post = mysqli_query($db, "SELECT * FROM `pizzas` WHERE `id` = '$post_id' "); // вытаскиваем из БД нужный пост по id
    $post = mysqli_fetch_assoc($post); // конвертируем в ассоциативный массив для дальнейших манипуляций
	
	// записываем данные в переменные
	
	if(isset($_POST['edit_pizza_submit'])){
        $edit_title    = $_POST['edit_title'];
        $edit_category = $_POST['edit_category'];
        $edit_image    = $_POST['edit_image'];
        $edit_price    = $_POST['edit_price'];
    	if(!empty($edit_title) && !empty($edit_category) && !empty($edit_image) && !empty($edit_price)){
            mysqli_query($db, "UPDATE `pizzas` SET `title`='".$edit_title."', `category`='".$edit_category."', `image`='".$edit_image."', `price`='".$edit_price."' WHERE `id`=".$post_id);
            header('Location: admin_page.php'); // перекидываем на страницу администратора

        } else{
            header('Location: admin_page.php'); // перекидываем на страницу администратора
        }
        mysqli_query($db, "UPDATE `pizzas` SET `title`='$edit_title', `category`='$edit_category', `image`='$edit_image', `price`='$edit_price' WHERE `id`='$post_id'");
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
    <div class="edit-pizza_form">
        <form action="" method="post">
                <input type="text" name="edit_title" value="<?=$post['title']?>" placeholder="Название">
                <input type="text" name="edit_category" value="<?=$post['category']?>" placeholder="Категория">
                <input type="text" name="edit_image" value="<?=$post['image']?>" placeholder="Ссылка на изображение">
                <input type="text" name="edit_price" value="<?=$post['price']?>" placeholder="Цена">

                <input type="submit" name="edit_pizza_submit" value="Обновить" class="edit-pizza_button">
        </form>
    </div>    
</body>
</html>


