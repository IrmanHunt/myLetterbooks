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

?>

<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>
  <?php include 'header.php'; ?>

  <main class="main" style="flex-direction: column;">

    <div style="border: 5px solid black; width: 100%; height: 180px; display: flex; align-items: center;">

      <div style="height: 100%; flex: 1; display: flex; align-items: center; justify-content: center;">
        <img src="./avatars/<?= $user_avatar ?>.ico" style="border-radius:50%; height: 130px; margin: 10px;" />
        <span style="margin: 10px;">
          <?= $user_name ?>
        </span>
        <a href="#" style="color: black; margin: 10px;"> Настройки</a>
        <a href="exit.php" style="color: black; margin: 10px;"> Выйти</a>
      </div>

      <div style="height: 100%; flex: 1; display: flex; align-items: center; justify-content: center;">
        <div style="display: flex; flex-direction: column; align-items: center;">
          <span><?=$profile_books_row?></span>
          <a href="./profile-books.php?user_id=<?=$user_id?>" style="color: black;">Книг</a>
        </div>
      </div>

    </div>

    <?php include 'user-profile-nav.php'; ?>
    <div style="border: 5px solid green; flex: 1; display: flex">
      <div style="border: 5px solid orange; flex: 0.6;">

      </div>
      <div style="border: 5px solid orange; flex: 0.4;">
        <div style="border: 5px solid black; background-color: #157347;">
          <a href="readlist.php?user_id=<?= $user_id ?>">Ридлист</a>
        </div>
      </div>
    </div>
  </main>

  <?php include 'footer.php'; ?>
</body>

</html>