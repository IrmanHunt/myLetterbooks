<?php
$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}

$result = mysqli_query($induction, "SELECT * FROM users WHERE name = '" . $_COOKIE['user'] . "';");
$user_id = $result->fetch_assoc()['id'];


$book_id = $_GET['book_id'];
$result = mysqli_query($induction, "SELECT * FROM books WHERE id = $book_id;");
$book = $result->fetch_assoc();
$book_name = $book['name'];
$book_description = $book['description'];
$book_poster = $book['poster'];


$result = mysqli_query($induction, "SELECT * FROM profile_books WHERE user_id = $user_id AND book_id = $book_id;");
$profile_books_row = $result->fetch_assoc();


$result = mysqli_query($induction, "SELECT * FROM readlist WHERE user_id = $user_id AND book_id = $book_id;");
$readlist_row = $result->fetch_assoc();


$result = mysqli_query($induction, "SELECT * FROM likes WHERE user_id = $user_id AND book_id = $book_id;");
$likes_row = $result->fetch_assoc();

?>



<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

  <?php include 'header.php'; ?>

  <main class="main">
    <div style="border: 5px solid red; flex: 0.4; display: flex; justify-content: center;">
      <img src="./book-posters/<?php echo $book_poster ?>.png" style="width: 80%;height: 300px;" alt="Постер книги" />
    </div>
    <div style="border: 5px solid yellow; flex: 1; display: flex; flex-direction: column;">
      <div style="border: 5px solid black;width: 100%;">
        <?= $book_name ?>
      </div>
      <div style="border: 5px solid green;height: 100%; display: flex">
        <div style="border: 5px solid green; flex: 1">
          <?= $book_description ?>
        </div>
        <aside style="border: 5px solid brown; flex: 0.8">
          <div style="border: 5px solid red;">
          <?php
            if ($profile_books_row) {
              echo '<a href="./profile-books-from.php?book_id=' . $book_id . '" style="color: red;">Из прочитанного</a>';
            } else {
              echo '<a href="./profile-books-to.php?book_id=' . $book_id . '" style="color: black;">Прочитал</a>';
            }
            ?>
          </div>
          <div style="border: 5px solid red;">
            <?php
            if ($readlist_row) {
              echo '<a href="./readlist-from.php?book_id=' . $book_id . '" style="color: red;">Из ридлиста</a>';
            } else {
              echo '<a href="./readlist-to.php?book_id=' . $book_id . '" style="color: black;">В ридлист</a>';
            }
            ?>
          </div>
          <div style="border: 5px solid red;">
          <?php
            if ($likes_row) {
              echo '<a href="./likes-from.php?book_id=' . $book_id . '" style="color: red;">Убрать лайк</a>';
            } else {
              echo '<a href="./likes-to.php?book_id=' . $book_id . '" style="color: black;">Лайк</a>';
            }
            ?>
          </div>
          <div style="border: 5px solid red;">
            <button class="section__button">Отметить</button>
          </div>
        </aside>
      </div>
    </div>
  </main>

  <?php include 'diary-form.php'; ?>

  <?php include 'footer.php'; ?>

</body>

</html>