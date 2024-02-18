<?php

$main_user_id = $_COOKIE['id'];
$main_user_name = $_COOKIE['user'];
$main_user_avatar = $_COOKIE['avatar'];


?>


<header class="header">
  <nav class="navbar">
    <ul class="navbar-list">
      <li class="nav-item"><img src="./images/icons/bookIcon.ico" width="40" height="40" /></li>
      <li class="nav-item"><a href="/" class="logo">Letterbooks</a></li>
      <?php if (isset($_COOKIE['user'])) {
        echo '<li class="nav-item"><img src="./images/avatars/' . $main_user_avatar . '" style="border-radius:50%; height: 30px;" /></li>';
        echo '<li class="nav-item"><a href="user-profile.php?user_id=' . $main_user_id . '">' . $main_user_name . '</a></li>';
        echo '<li class="nav-item"><a href="books.php">Книги</a></li>';
        echo '<li class="nav-item"><a href="writers.php">Писатели</a></li>';
        echo '<li class="nav-item"><a href="members.php">Участники</a></li>';
        // echo '<a href="user-profile-settings.php" style="color: black; margin-right: 10px;"><img src="./icons/settings.png" style="height: 20px;" /></a>';
        // echo '<a href="exit.php" style="color: black;"><img src="./icons/exit.png" style="height: 20px;" /></a>';
      }
      ?>
    </ul>
  </nav>
</header>