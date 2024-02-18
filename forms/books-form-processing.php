<?php

$book_name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$book_year = filter_var(trim($_POST['year']), FILTER_SANITIZE_STRING);
$book_author = filter_var(trim($_POST['author']), FILTER_SANITIZE_STRING);
$book_pages = filter_var(trim($_POST['pages']), FILTER_SANITIZE_STRING);
$book_description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
$book_poster = filter_var(trim($_FILES['poster']['name']), FILTER_SANITIZE_STRING);

$induction = mysqli_connect('localhost', 'root', '', 'register-bd');

$result = mysqli_query($induction, "INSERT INTO books (name, year, author, description, poster, pages) VALUES ('$book_name', '$book_year', '$book_author', '$book_description', '$book_poster', '$book_pages');");

move_uploaded_file($_FILES['poster']['tmp_name'], __DIR__ . '\\..\\images\\book-posters\\' . $_FILES['poster']['name']);

header("Location: books.php");

?>