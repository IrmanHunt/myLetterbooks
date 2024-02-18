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


$result = mysqli_query($induction, "SELECT * FROM profile_books WHERE user_id = $user_id;");
$profile_books_row = $result->num_rows;


$result = mysqli_query($induction, "SELECT * FROM readlist WHERE user_id = $user_id;");
$readlist_row = $result->num_rows;


$readlist_result = mysqli_query($induction, "SELECT * FROM readlist WHERE user_id = '" . $user_id . "';");
$books_result = mysqli_query($induction, "SELECT * FROM books;");


$diary_result = mysqli_query($induction, "SELECT * FROM diary WHERE user_id = $user_id AND YEAR(date) = 2024 ORDER BY date DESC;");
$diary_row = $diary_result->num_rows;

?>

<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>
  <?php include 'header.php'; ?>

  <main class="main" style="flex-direction: column;">

    <div
      style="border: 4px solid black; border-radius: 10px; margin-top: 10px; width: 100%; height: 180px; display: flex; align-items: center;">

      <div style="height: 100%; flex: 1; display: flex; align-items: center; justify-content: center;">
        <img src="./images/avatars/<?= $user_avatar ?>"
          style="border-radius:50%; height: 130px; margin-right: 30px; border: 2px solid #157347;" />
        <div>
          <div style="display: flex; flex-direction: column; align-items: center; position: relative;">
            <div>
              <span style="margin-right: 10px;">
                <?= $user_name ?>
              </span>
              <a href="settings.php" style="color: black; margin-right: 10px;">Настройки</a>
              <a href="exit.php" style="color: black;">Выход</a>
            </div>
          </div>
        </div>
      </div>

      <div style="height: 100%; flex: 1; display: flex; align-items: center; justify-content: center;">
        <div style="display: flex; flex-direction: column; align-items: center; margin-right: 20px;">
          <span>
            <?= $profile_books_row ?>
          </span>
          <a href="./profile-books.php?user_id=<?= $user_id ?>" style="color: black;">Книг</a>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center;">
          <span>
            <?= $diary_row ?>
          </span>
          <a href="./diary.php?user_id=<?= $user_id ?>" style="color: black;">В 2024</a>
        </div>
      </div>

    </div>

    <?php include 'user-profile-nav.php'; ?>

    <!-- Основное -->
    <div class="user-profile-two-aside">

      <div class="user-profile-left-adise">
        <div class="user-profile-recent">
          <h5>Последняя активность</h5>
          <hr class="line" style="width: 90%; margin: 4px;">
          <div style="width: 88%;">
            <ul class="user-profile-recent-ul">
              <?php
              $c = 0;
              while ($real_diary_book = $diary_result->fetch_assoc()) {
                if ($c == 4)
                  break;
                $books_result = mysqli_query($induction, "SELECT * FROM books WHERE id = '" . $real_diary_book['book_id'] . "';");
                $diary_book = $books_result->fetch_assoc();
                ?>

                <div>

                  <div>
                    <li class="book-element"><a href="./book-profile.php?book_id=<?php echo $diary_book['id'] ?>"><img
                          src="./images/book-posters/<?php echo $diary_book['poster'] ?>" width="110" height="165"
                          style="border-radius: 10px; border: 2px solid #157347;" /></a></li>
                  </div>

                  <div style="position: relative; top: 50px; left: 20px;">
                    <label class="under-book-rate" style="<?php if ($real_diary_book['rate'] >= 1)
                      echo 'color: #ffc107' ?>">&#9733;</label>
                      <label class="under-book-rate" style="<?php if ($real_diary_book['rate'] >= 2)
                      echo 'color: #ffc107' ?>">&#9733;</label>
                      <label class="under-book-rate" style="<?php if ($real_diary_book['rate'] >= 3)
                      echo 'color: #ffc107' ?>">&#9733;</label>
                      <label class="under-book-rate" style="<?php if ($real_diary_book['rate'] >= 4)
                      echo 'color: #ffc107' ?>">&#9733;</label>
                      <label class="under-book-rate" style="<?php if ($real_diary_book['rate'] == 5)
                      echo 'color: #ffc107' ?>">&#9733;</label>
                      <label class="under-book-rate" style="font-size: 8px">
                      <?php if ($real_diary_book['my_like'])
                      echo '&#10084;' ?>
                      </label>
                    </div>

                  </div>

                  <?php
                    $c++;
              }
              ?>
            </ul>
          </div>
        </div>
      </div>

      <!-- Справа -->
      <div class="user-profile-right-aside">
        <div class="user-profile-readlist">
          <div class="user-profile-readlist-info">
            <a href="readlist.php?user_id=<?= $user_id ?>"
              style="color: black; position: absolute; left: 35px;">Ридлист</a>
            <span style="position: absolute; right: 35px;">
              <?= $readlist_row ?>
            </span>
          </div>
          <hr class="line" style="width: 90%; margin: 4px;">

          <div class="user-profile-readlist-books-area">

            <ul class="books-list">
              <?php
              $c = 0;
              while ($readlist_book = $readlist_result->fetch_assoc()) {
                if ($c == 4)
                  break;
                $books_result = mysqli_query($induction, "SELECT * FROM books WHERE id = '" . $readlist_book['book_id'] . "';");
                $readlist_book = $books_result->fetch_assoc();
                ?>
                <li class="book-element"><a href="./book-profile.php?book_id=<?php echo $readlist_book['id'] ?>"><img
                      src="./images/book-posters/<?php echo $readlist_book['poster'] ?>" width="75" height="105"
                      style="border-radius: 10px; border: 2px solid #157347" /></a></li>
                <?php
                $c++;
              }
              ?>
            </ul>

          </div>

        </div>
      </div>
    </div>

  </main>

  <?php include 'footer.php'; ?>
</body>

</html>