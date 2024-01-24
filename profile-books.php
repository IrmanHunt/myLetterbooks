<?php
$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}

$user_id = $_GET['user_id'];

$user_result = mysqli_query($induction, "SELECT * FROM users WHERE id = $user_id;");
$user_name = $user_result->fetch_assoc()['name'];

$profile_books_result = mysqli_query($induction, "SELECT * FROM profile_books WHERE user_id = '" . $user_id . "';");
$books_result = mysqli_query($induction, "SELECT * FROM books;");

?>


<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

  <?php include 'header.php'; ?>

  <main class="main">
  <h3>Книги, которые прочитал(а) <?=$user_name?></h3>
    <div class="books-area">
      <ul class="books-list">
        <?php
        while ($profile_book = $profile_books_result->fetch_assoc()) {
          $books_result = mysqli_query($induction, "SELECT * FROM books WHERE id = '".$profile_book['book_id']."';");
          $profile_book = $books_result->fetch_assoc();
          ?>
          <li class="book-element"><a href="./book-profile.php?book_id=<?php echo $profile_book['id'] ?>"><img
                src="./book-posters/<?php echo $profile_book['poster'] ?>.png" width="75" height="110"
                style="border-radius: 10px; border: 2px solid #157347" /></a></li>
          <?php
        }
        ?>
      </ul>
    </div>
  </main>

  <?php include 'footer.php'; ?>

</body>

</html>