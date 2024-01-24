<?php
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$password = md5($password . "qsqwpowzqpqopw");

$mysql = new mysqli('localhost', 'root', '', 'register-bd');

$result = $mysql->query("SELECT * FROM users WHERE name = '$name' AND password = '$password';");
$user = $result->fetch_assoc();


if (count($user) == 0) {
    header('Location: index.php?error=incorrect_password');
    exit();
}


setcookie("id", $user["id"], time() + 3600 * 24, "/");
setcookie("user", $user["name"], time() + 3600 * 24, "/");
setcookie("avatar", $user["avatar"], time() + 3600 * 24, "/");

$mysql->close();

header("Location: /");

?>