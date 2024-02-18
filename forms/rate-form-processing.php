<?php

$induction = mysqli_connect('localhost', 'root', '', 'register-bd');

$user_id = $_COOKIE['id'];
$book_id = $_GET['book_id'];
$rate = $_POST['rate'];


$result = mysqli_query($induction, "SELECT * FROM profile_books WHERE user_id = $user_id AND book_id = $book_id;");
$profile_books_row = $result->num_rows;

if ($profile_books_row) {
    $result = mysqli_query($induction, "UPDATE profile_books SET rate = $rate WHERE user_id = $user_id AND book_id = $book_id;");
} else {
    $result = mysqli_query($induction, "INSERT INTO profile_books (user_id, book_id, rate) VALUES ($user_id, $book_id, $rate);");
}


$result = mysqli_query($induction, "INSERT INTO diary (user_id, book_id, date, my_like, review, reread) VALUES ($user_id, $book_id, '$date', $like, '$review', $reread);");

header("Location: /book-profile.php?book_id=".$book_id);

?>