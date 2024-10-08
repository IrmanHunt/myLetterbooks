<?php
$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}

$user_id = $_GET['user_id'];

$result = mysqli_query($induction, "SELECT * FROM users WHERE id = $user_id;");
$user = $result->fetch_assoc();
$user_name = $user['name'];
$user_avatar = $user['avatar'];

$readlist_result = mysqli_query($induction, "SELECT * FROM readlist WHERE user_id = '" . $user_id . "';");
$books_result = mysqli_query($induction, "SELECT * FROM books;");

?>



<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

  <?php include 'header.php'; ?>


  <main class="main">
    <?php include 'user-profile-nav.php'; ?>
    <h5 style="position: relative; top: 4px;">Книги, которые
      <?= $user_name ?> хочет прочитать
    </h5>
    <hr class="line">
    <div class="books-area">
      <ul class="books-list">
        <?php
        while ($readlist_book = $readlist_result->fetch_assoc()) {
          $books_result = mysqli_query($induction, "SELECT * FROM books WHERE id = '" . $readlist_book['book_id'] . "';");
          $readlist_book = $books_result->fetch_assoc();
          ?>
          <li class="book-element"><a href="./book-profile.php?book_id=<?php echo $readlist_book['id'] ?>"><img
                src="./images/book-posters/<?php echo $readlist_book['poster'] ?>" width="75" height="110"
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