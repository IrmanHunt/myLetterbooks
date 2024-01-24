<?php

$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}

$result = mysqli_query($induction, "SELECT * FROM users WHERE name = '" . $_COOKIE['user'] . "';");
$user_id = $result->fetch_assoc()['id'];


$result = mysqli_query($induction, "DELETE FROM likes WHERE user_id = $user_id AND book_id = ".$_GET['book_id'].";");


header("Location: ./book-profile.php?book_id=".$_GET['book_id']);

?>