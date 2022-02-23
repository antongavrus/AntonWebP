<?php

    // подключаемся к базе данных

    $db = mysqli_connect('localhost', 'root', 'root', 'anton_web');

    // в случае неудачной попытки подключения выводим соответствующее сообщение
    if (!$db) {
        die('Error connect to Data Base');
    }