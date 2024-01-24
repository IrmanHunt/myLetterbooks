<?php

$user_id = $_COOKIE['id'];
$book_id = $_GET['book_id'];
$date = filter_var(trim($_POST['watchDate']), FILTER_SANITIZE_STRING);
$review = filter_var(trim($_POST['myReview']), FILTER_SANITIZE_STRING);


$induction = mysqli_connect('localhost', 'root', '', 'register-bd');

$result = mysqli_query($induction, "INSERT INTO diary (user_id, book_id, date, opinion, review) VALUES ($user_id, $book_id, '$date', 'like', '$review');");

header("Location: book-profile.php?book_id=".$book_id);

?>