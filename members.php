<?php
$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}


$user_id = $_COOKIE['id'];

$result = mysqli_query($induction, "SELECT * FROM users;");

?>



<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

  <?php include 'header.php'; ?>

  <main class="main">

    <ul>
    <?php
        while ($user = $result->fetch_assoc()) {
          ?>
          <li><a href = "user-profile.php?user_id=<?=$user['id']?>" style="color: black"><?=$user['name']?></a></li>
          <?php
        }
        ?>
    </ul>


  </main>

  <?php include 'footer.php'; ?>

</body>

</html>