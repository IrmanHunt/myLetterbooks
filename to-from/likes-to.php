<?php

$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}

$user_id = $_COOKIE['id'];
$book_id = $_GET['book_id'];



$result = mysqli_query($induction, "SELECT * FROM profile_books WHERE user_id = $user_id AND book_id = $book_id;");
$profile_books_row = $result->num_rows;

if ($profile_books_row) {
    $result = mysqli_query($induction, "UPDATE profile_books SET myLike = 1 WHERE user_id = $user_id AND book_id = $book_id;");
} else {
    $result = mysqli_query($induction, "INSERT INTO profile_books (user_id, book_id, rate, myLike) VALUES ($user_id, $book_id, 0, 1);");
}




header("Location: /book-profile.php?book_id=".$book_id);

?>