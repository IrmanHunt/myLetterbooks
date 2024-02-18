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

  <h3 style="position: relative; top: 10px;">Участники
      <?= $user_name ?>
    </h3>
    <hr class="line">

    <ul>
      <?php
      while ($user = $result->fetch_assoc()) {
        $user_avatar = $user['avatar'];
        ?>
        <li class="members-list"> 
          <img src="./images/avatars/<?php echo $user_avatar; ?>" style="border-radius:50%; height: 100px; margin: 0 20px;" />
          <a href="user-profile.php?user_id=<?= $user['id'] ?>" style="color: black">
            <?= $user['name'] ?>
          </a>
        </li>
        <?php
      }
      ?>
    </ul>


  </main>

  <?php include 'footer.php'; ?>

</body>

</html>