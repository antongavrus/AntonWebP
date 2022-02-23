<?php

    require_once 'db_config.php';

    // проверяем наличие факта отправки формы
    if(isset($_POST['send_reg'])){

        // присваиваем переменным данные из соответствующей формы и экранируем данные для безопасности
        // с помощью mysqli_real_escape_string
        $login        = mysqli_real_escape_string($db, $_POST['login']);
        $email        = mysqli_real_escape_string($db, $_POST['email']);
        $password     = mysqli_real_escape_string($db, $_POST['password']);
        $confirm_pass = mysqli_real_escape_string($db, $_POST['confirm_pass']);
        // проверяем заполнены ли поля
        if(!empty($login) && !empty($email) && !empty($password) && !empty($confirm_pass)){
            // проверяем совпадают ли пароли
            if($password == $confirm_pass){
                // проверяем наличие пользователя с полученным из формы логином
                $check_login = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login'");

                // если пользователь с таким логином не найден, то совершаем добавление записей в БД
                if(mysqli_num_rows($check_login) < 1){

                    $pass_final = md5($password); 
                    // хэшируем пароль, чтобы при сливе записей из БД конфиденциальность пользователя
                    // не пострадала :)
                    mysqli_query($db, "INSERT INTO `users`(`login`, `email`, `password`) VALUES ('$login', '$email', '$pass_final')");

                    header('Location: login_page.html');

                } else{

                    // в случае провала делаем обратную переадресацию

                    header('Location: form_reg.html');
                }           
            }
        }
    }