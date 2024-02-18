<?php
$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
  echo "Ошибка подключениия";
}

$result = mysqli_query($induction, "SELECT * FROM writers;");

?>



<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

  <?php include 'header.php'; ?>

  <main class="main">

  <button class="section__button section__button2 btn btn-success" style="margin: 20px; width: 170px; position: relative; top: 10px;">Добавить
      писателя</button>

    <hr class="line">

    <div class="books-area">
      <ul class="books-list">
        <?php
        while ($writer = $result->fetch_assoc()) {
          ?>
          <li class="book-element"><a href="#"><img
                src="./images/writer-portraits/<?php echo $writer['portrait'] ?>" width="75" height="110"
                style="border-radius: 10px; border: 2px solid #157347" /></a></li>
          <?php
        }
        ?>
      </ul>
    </div>

  </main>

  <?php include './forms/writer-form.php'; ?>

  <?php include 'footer.php'; ?>

</body>

</html>