<?php 
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$password = filter_var(trim($_POST['password'] ?? ''), FILTER_SANITIZE_STRING);

$mysql = new mysqli("localhost", "user", "password", "RegForm");

if ($mysql->connect_error) {
    die("Ошибка подключения: " . $mysql->connect_error);
}

$stmt = $mysql->prepare("SELECT `name` FROM `Regist` WHERE `email` = ? AND `password` = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    echo "Такого пользователя нет";
    exit();
} else {
    echo("Добро пожаловать, ". $user['name']);
    exit();
}

$mysql->close();
?>
