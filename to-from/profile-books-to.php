<?php

$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}

$result = mysqli_query($induction, "INSERT INTO profile_books (user_id, book_id, rate) VALUES (".$_COOKIE['id'].",".$_GET['book_id'].", 0);");

header("Location: /book-profile.php?book_id=".$_GET['book_id']);

?>