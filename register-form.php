<?php 
    $login = filter_var(trim($_POST['nickname']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    if(mb_strlen($login) < 5 || mb_strlen($login) > 90) { 
        echo "Логин должен быть больше 5 и меньше 90 символов";
        exit();
    }
    if(mb_strlen($email) < 5 || mb_strlen($email) > 90) { 
        echo "Почта должна быть больше 5 и меньше 90 символов";
        exit();
    }
    if(mb_strlen($password) < 5 || mb_strlen($password) > 90) { 
        echo "Пароль должен быть больше 5 и меньше 90 символов";
        exit();
    }
    $mysql = new mysqli("localhost","sanki","password","RegForm");
    $mysql->query("INSERT INTO `Regist` (`name`, `email`, `password`)
    VALUES('$login','$email','$password')");

    $mysql->close();
    header('Location: /');
?>