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

$like_result = mysqli_query($induction, "SELECT * FROM profile_books WHERE user_id = $user_id and myLike = 1;");
$books_result = mysqli_query($induction, "SELECT * FROM books;");

?>


<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

  <?php include 'header.php'; ?>

  <main class="main">
    <?php include 'user-profile-nav.php'; ?>
    <h5 style="position: relative; top: 4px;">Книги, которые нравятся
      <?= $user_name ?>
    </h5>
    <hr class="line">
    <div class="books-area">
      <ul class="books-list">

        <?php
        while ($real_like_book = $like_result->fetch_assoc()) {
          $books_result = mysqli_query($induction, "SELECT * FROM books WHERE id = '" . $real_like_book['book_id'] . "';");
          $like_book = $books_result->fetch_assoc();
          ?>

          <div>

            <div>
              <li class="book-element"><a href="./book-profile.php?book_id=<?php echo $like_book['id'] ?>"><img
                    src="./images/book-posters/<?php echo $like_book['poster'] ?>" width="75" height="110"
                    style="border-radius: 5px; border: 2px solid #157347" /></a></li>
            </div>

            <div>
              <label class="under-book-rate" style="<?php if ($real_like_book['rate'] >= 1)
                echo 'color: #ffc107' ?>">&#9733;</label>
                <label class="under-book-rate" style="<?php if ($real_like_book['rate'] >= 2)
                echo 'color: #ffc107' ?>">&#9733;</label>
                <label class="under-book-rate" style="<?php if ($real_like_book['rate'] >= 3)
                echo 'color: #ffc107' ?>">&#9733;</label>
                <label class="under-book-rate" style="<?php if ($real_like_book['rate'] >= 4)
                echo 'color: #ffc107' ?>">&#9733;</label>
                <label class="under-book-rate" style="<?php if ($real_like_book['rate'] == 5)
                echo 'color: #ffc107' ?>">&#9733;</label>
                <label class="under-book-rate" style="font-size: 8px">
                <?php if ($real_like_book['myLike'])
                echo '&#10084;' ?>
                </label>
              </div>

            </div>

          <?php
        }
        ?>

      </ul>
    </div>
  </main>

  <?php include 'footer.php'; ?>

</body>

</html>