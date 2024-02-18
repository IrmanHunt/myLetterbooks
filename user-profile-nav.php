<div class="user_profile_nav">
  <nav class="navbar" style="justify-content: center;">
    <ul class="navbar-list">
      <?php if (isset($_COOKIE['user']))
        echo '<li class="nav-item"><img src="./images/avatars/' . $user_avatar . '" style="border-radius:50%; height: 30px;" /></li>';
      echo '<li class="nav-item"><a href="user-profile.php?user_id=' . $user_id . '">' . $user_name . '</a></li>';
      ?>
      <!-- <li class="nav-item"><a href="./user-profile.php?user_id=<?= $user_id ?>">Профиль</a></li> -->
      <li class="nav-item"><a href="./activity.php?user_id=<?= $user_id ?>">Активность</a></li>
      <li class="nav-item"><a href="./profile-books.php?user_id=<?= $user_id ?>">Книги</a></li>
      <li class="nav-item"><a href="diary.php?user_id=<?= $user_id ?>">Дневник</a></li>
      <li class="nav-item"><a href="./readlist.php?user_id=<?= $user_id ?>">Ридлист</a></li>
      <li class="nav-item"><a href="./likes.php?user_id=<?= $user_id ?>">Лайки</a></li>
    </ul>
  </nav>
</div>