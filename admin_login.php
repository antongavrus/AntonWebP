<?php

    // объявляем начало сессии
    session_start();

    require_once 'db_config.php';

    // проверяем наличие факта отправки формы
    if(isset($_POST['send_admin_login'])){

        // присваиваем переменным данные из соответствующей формы
        $login        = $_POST['login'];
        $password     = $_POST['password'];

        // проверяем заполнены ли поля
        if(!empty($login) && !empty($password)){
            // проверяем наличие пользователя с полученными из post-запроса данными
            $find_admin = mysqli_query($db, "SELECT * FROM `official` WHERE `login` = '$login' AND `password`='$password' AND `role`='admin'");

            // если количество положительных результатов после проверке больше нуля, т.е. пользователь
            // с такими данными существует в базе
            if(mysqli_num_rows($find_admin) > 0){

                // конвертируем наш объект в ассоциативный массив, чтобы вытащить его логин, установить
                // роль и поместить в сессию
                $admin = mysqli_fetch_assoc($find_admin);

                $_SESSION['user'] = [
                    "login" => $admin['login'],
                    "role" => "admin"
                ];

                // в случае успешного завершения проверки делаем переадресацию на страничку профиля

                header('Location: admin_panel/admin_page.php');

            } else{

                // в случае провала делаем переадресацию на форму регистрации

                header('Location: form_reg.html');
            }

        }
    }