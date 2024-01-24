<?php
$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}

$result = mysqli_query($induction, "SELECT * FROM books;");

?>



<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

  <?php include 'header.php'; ?>

  <main class="main">
    <div class="books-area">
      <ul class="books-list">
        <?php
        while ($book = $result->fetch_assoc()) {
          ?>
          <li class="book-element"><a href="./book-profile.php?book_id=<?php echo $book['id'] ?>"><img
                src="./book-posters/<?php echo $book['poster'] ?>.png" width="75" height="110"
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