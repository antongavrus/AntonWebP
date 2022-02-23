<?php

    // объявляем начало сессии
    session_start();

    require_once 'db_config.php';

    // проверяем наличие факта отправки формы
    if(isset($_POST['send_operator_login'])){

        // присваиваем переменным данные из соответствующей формы
        $login        = mysqli_real_escape_string($db, $_POST['login']);
        $password     = mysqli_real_escape_string($db, $_POST['password']);

        // проверяем заполнены ли поля
        if(!empty($login) && !empty($password)){
            // проверяем наличие пользователя с полученными из post-запроса данными
            $find_operator = mysqli_query($db, "SELECT * FROM `official` WHERE `login` = '$login' AND `password`='$password' AND `role`='operator'");

            // если количество положительных результатов после проверке больше нуля, т.е. пользователь
            // с такими данными существует в базе
            if(mysqli_num_rows($find_operator) > 0){

                // конвертируем наш объект в ассоциативный массив, чтобы вытащить его логин, установить
                // роль и поместить в сессию
                $operator = mysqli_fetch_assoc($find_operator);

                $_SESSION['user'] = [
                    "login" => $operator['login'],
                    "role" => "operator"
                ];

                // в случае успешного завершения проверки делаем переадресацию на страничку профиля

                header('Location: operator_panel/operator_page.php');

            } else{

                // в случае провала делаем переадресацию на форму регистрации

                header('Location: form_reg.html');
            }

        }
    }