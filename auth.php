<?php
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);


// if (mb_strlen($name) < 5 || mb_strlen($name) > 20) {
//     echo "Недопустимая длина имени!";
//     exit();
// } else if (mb_strlen($password) < 5 || mb_strlen($password) > 40) {
//     echo "Недопустимая длина пароля!";
//     exit();
// }


$password = md5($password . "qsqwpowzqpqopw");

$mysql = new mysqli('localhost', 'root', '', 'register-bd');

$mysql->query("INSERT INTO users (login, password, name) VALUES ('$login', '$password', '$name');");
$mysql->close();

header("Location: /");

?>