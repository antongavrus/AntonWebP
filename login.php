<?php

    // объявляем начало сессии
    session_start();

    require_once 'db_config.php';

    // проверяем наличие факта отправки формы
    if(isset($_POST['send_login'])){

        // присваиваем переменным данные из соответствующей формы
        $login        = mysqli_real_escape_string($db, $_POST['login']);
        $email        = mysqli_real_escape_string($db, $_POST['email']);
        $password     = mysqli_real_escape_string($db, $_POST['password']);

        $pass = md5($password);

        // проверяем заполнены ли поля
        if(!empty($login) && !empty($email) && !empty($password)){
            // проверяем наличие пользователя с полученными из post-запроса данными
            $find_user = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' AND `password`='$pass'");

            // если количество положительных результатов после проверке больше нуля, т.е. пользователь
            // с такими данными существует в базе
            if(mysqli_num_rows($find_user) > 0){

                // конвертируем наш объект в ассоциативный массив, чтобы вытащить его логин, установить
                // роль и поместить в сессию
                $user = mysqli_fetch_assoc($find_user);

                $_SESSION['user'] = [
                    "login" => $user['login'],
                    "role" => "user",
                    "email" => $email
                ];

                // в случае успешного завершения проверки делаем переадресацию на страничку профиля

                header('Location: page.php');

            } else{

                // в случае провала делаем переадресацию на форму регистрации

                header('Location: form_reg.html');
            }

        }
    }