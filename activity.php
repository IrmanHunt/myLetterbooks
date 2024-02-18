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

?>



<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

    <?php include 'header.php'; ?>

    <main class="main">

        <?php include 'user-profile-nav.php'; ?>
        <h5 style="position: relative; top: 4px;">Активность</h5>
        <hr class="line">



    </main>

    <?php include 'footer.php'; ?>

</body>

</html>