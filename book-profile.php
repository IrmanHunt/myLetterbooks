<?php
$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}


$user_id = $_COOKIE['id'];
$book_id = $_GET['book_id'];


$result = mysqli_query($induction, "SELECT * FROM books WHERE id = $book_id;");
$book = $result->fetch_assoc();
$book_name = $book['name'];
$book_year = $book['year'];
$book_author = $book['author'];
$book_description = $book['description'];
$book_poster = $book['poster'];
$book_pages = $book['pages'];


$result = mysqli_query($induction, "SELECT * FROM profile_books WHERE user_id = $user_id AND book_id = $book_id;");
$profile_book = $result->fetch_assoc();
$profile_book_myLike = $profile_book['myLike'];


$result = mysqli_query($induction, "SELECT * FROM readlist WHERE user_id = $user_id AND book_id = $book_id;");
$readlist_row = $result->fetch_assoc();


?>



<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

  <?php include 'header.php'; ?>

  <main class="main" style="margin-top: 20px;">

    <div style="display: flex; width: 100%; height: 100%; text-align: left;">


      <!-- Постер книги -->
      <div style="flex: 0.4; display: flex; justify-content: center;">
        <img src="./images/book-posters/<?php echo $book_poster ?>"
          style="width: 80%;height: 300px; margin: 20px; border: 4px solid #157347; border-radius: 10px;"
          alt="Постер книги" />
      </div>



      <div style="flex: 1; display: flex; flex-direction: column;">


        <!-- Название книги, год, автор -->
        <div>
          <div style="width: 100%; margin: 20px 0px 10px 0;">
            <span style="font-size: 30px; margin-right: 10px;"><strong>
                <?= $book_name ?>
              </strong>
              <?= $book_year ?>
            </span>
            <h3>Автор:
              <?= $book_author ?>
            </h3>
          </div>
        </div>



        <div style="height: 100%; display: flex">

          <div style="flex: 1">
            <!-- Описание книги -->
            <h5 class="book-description">
              <?= $book_description ?>
            </h5>
            <!-- Количество страниц -->
            <h5>
            Cтраниц: ~<?= $book_pages ?>
            </h5>
          </div>


          <!-- Бокоавя панель с отметками -->
          <aside class="book-profile-aside">


            <!-- Прочитал \ не прочитал -->
            <div class="book-profile-aside-item">
              <?php
              if ($profile_book) {
                echo '<a href="./to-from/profile-books-from.php?book_id=' . $book_id . '"><img src="./images/icons/from-read.png" class="book-profile-aside-icon" /></a>';
              } else {
                echo '<a href="./to-from/profile-books-to.php?book_id=' . $book_id . '"><img src="./images/icons/to-read.png" class="book-profile-aside-icon" /></a>';
              }
              ?>
            </div>

            <!-- В ридлисте \ не в ридлисте -->
            <div class="book-profile-aside-item">
              <?php
              if ($readlist_row) {
                echo '<a href="./to-from/readlist-from.php?book_id=' . $book_id . '""><img src="./images/icons/from-readlist.png" class="book-profile-aside-icon" /></a>';
              } else {
                echo '<a href="./to-from/readlist-to.php?book_id=' . $book_id . '""><img src="./images/icons/to-readlist.png" class="book-profile-aside-icon" /></a>';
              }
              ?>
            </div>

            <!-- Лайк \ без лайка -->
            <div class="book-profile-aside-item">
              <?php
              if ($profile_book_myLike) {
                echo '<a href="./to-from/likes-from.php?book_id=' . $book_id . '"><img src="./images/icons/from-like.png" class="book-profile-aside-icon" /></a>';
              } else {
                echo '<a href="./to-from/likes-to.php?book_id=' . $book_id . '"><img src="./images/icons/to-like.png" class="book-profile-aside-icon" /></a>';
              }
              ?>
            </div>

            <!-- Оценка -->
            <div class="book-profile-aside-item">

              <form action="/forms/rate-form-processing.php?book_id=<?php echo $book_id ?>" method="post">

                <?php if ($profile_book['rate'] != 0)
                  echo '<button type="submit" name="rate" value="0" class="delete-but">&#10006;</button>' ?>

                  <div class="star-widget">
                    <button type="submit" name="rate" value="5" style="<?php if ($profile_book['rate'] >= 5)
                  echo 'color: #ffcc00;'; ?>">&#9733;</button>
                  <button type="submit" name="rate" value="4" style="<?php if ($profile_book['rate'] >= 4)
                    echo 'color: #ffcc00;'; ?>">&#9733;</button>
                  <button type="submit" name="rate" value="3" style="<?php if ($profile_book['rate'] >= 3)
                    echo 'color: #ffcc00;'; ?>">&#9733;</button>
                  <button type="submit" name="rate" value="2" style="<?php if ($profile_book['rate'] >= 2)
                    echo 'color: #ffcc00;'; ?>">&#9733;</button>
                  <button type="submit" name="rate" value="1" style="<?php if ($profile_book['rate'] >= 1)
                    echo 'color: #ffcc00;'; ?>">&#9733;</button>
                </div>

              </form>

            </div>

            <div class="book-profile-aside-item">

              <button class="section__button section__button1 btn btn-success"
                style="margin: 10px; width: 120px;">Отметить</button>

            </div>


          </aside>



        </div>
      </div>
    </div>

  </main>

  <?php include './forms/diary-form.php'; ?>

  <?php include 'footer.php'; ?>

</body>

</html>