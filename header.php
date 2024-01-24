<?php

$main_user_id = $_COOKIE['id'];
$main_user_name = $_COOKIE['user'];
$main_user_avatar = $_COOKIE['avatar'];


?>


<header class="header">
  <nav class="navbar">
    <ul class="navbar-list">
      <li class="nav-item"><img src="bookIcon.ico" width="40" height="40" /></li>
      <li class="nav-item"><a href="/" class="logo">Letterbooks</a></li>
      <?php if(isset($_COOKIE['user']))
      echo '<li class="nav-item"><img src="./avatars/'.$main_user_avatar.'.ico" style="border-radius:50%; height: 30px;" /></li>';
      echo '<li class="nav-item"><a href="user-profile.php?user_id='.$main_user_id.'">'.$main_user_name.'</a></li>';
      ?>
      <li class="nav-item"><a href="books.php">Книги</a></li>
      <li class="nav-item"><a href="members.php">Участники</a></li>
    </ul>
  </nav>
</header>