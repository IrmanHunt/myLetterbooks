<?php

$user_id = $_COOKIE['id'];
$book_id = $_GET['book_id'];
$date = filter_var(trim($_POST['watchDate']), FILTER_SANITIZE_STRING);
$review = filter_var(trim($_POST['myReview']), FILTER_SANITIZE_STRING);
$like = isset($_POST['like']) ? 1 : 0;
$reread = isset($_POST['reread']) ? 1 : 0;
$rate = $_POST['rating'];



$induction = mysqli_connect('localhost', 'root', '', 'register-bd');

$result = mysqli_query($induction, "INSERT INTO diary (user_id, book_id, date, my_like, review, reread, rate) VALUES ($user_id, $book_id, '$date', $like, '$review', $reread, $rate);");



//Надо занести в profile-books, если там еще нет
{
    $result = mysqli_query($induction, "SELECT * FROM profile_books WHERE user_id = '" . $_COOKIE['id'] . "' and book_id = $book_id;");

    if ($result->num_rows) {
        header("Location: book-profile.php?book_id=" . $book_id);
    } else {
        $result = mysqli_query($induction, "INSERT INTO profile_books (user_id, book_id) VALUES (" . $_COOKIE['id'] . "," . $_GET['book_id'] . ");");
    }
}

//Надо удалить из ридлиста, если там есть
$result = mysqli_query($induction, "DELETE FROM readlist WHERE user_id = $user_id AND book_id = ".$_GET['book_id'].";");


//Надо занести в лайки, если там еще нет
{
    if ($like) {

        $result = mysqli_query($induction, "SELECT * FROM likes WHERE user_id = '" . $_COOKIE['id'] . "' and book_id = $book_id;");


        if ($result->num_rows) {
            header("Location: book-profile.php?book_id=" . $book_id);
        } else {
            header("Location: /to-from/likes-to.php?book_id=" . $book_id);
        }

    } else {
        header("Location: book-profile.php?book_id=" . $book_id);
    }
}





// if ($result) {
//     echo "Запись успешно добавлена.";
// } else {
//     echo "Ошибка при добавлении записи: " . mysqli_error($induction);
// }

?>