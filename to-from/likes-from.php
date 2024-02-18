<?php

$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}


$user_id = $_COOKIE['id'];
$book_id = $_GET['book_id'];

$result = mysqli_query($induction, "UPDATE profile_books SET myLike = 0 WHERE user_id = $user_id AND book_id = $book_id;");


header("Location: /book-profile.php?book_id=".$book_id);

?>