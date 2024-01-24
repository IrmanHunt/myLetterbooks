<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

  <?php include 'header.php'; ?>

  <main class="main">
    <?php if ($_COOKIE['user'] == ''): ?>
      <div class="container">
        <div class="row" style="flex-grow:1;">
          <div class="col">
            <br />
            <h1>Вход в аккаунт</h1>
            <br />
            <form action="check.php" method="post">
              <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" /><br />
              <input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль" /><br />
              <button type="submit" class="btn btn-success">Войти</button>
            </form>
            <?php
            if (isset($_GET['error']) && $_GET['error'] === 'incorrect_password') {
              echo "<br /><p style='color: red;font-size:20px'>Ошибка!</p>";
            }
            ?>
          </div>
          <div class="col">
            <br />
            <h1>Регистрация</h1>
            <br />
            <form action="auth.php" method="post">
              <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" disabled /><br />
              <input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль"
                disabled /><br />
              <button type="submit" class="btn btn-success" disabled>Зарегистрироваться</button>
            </form>
          </div>
        </div>
      </div>
    <?php else:
      header("Location: /user-profile.php?user_id=".$_COOKIE['id'].""); ?>
    <?php endif; ?>
  </main>

  <?php include 'footer.php'; ?>

</body>

</html>