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

$result = mysqli_query($induction, "SELECT * FROM diary WHERE user_id = $user_id ORDER BY date DESC;");

?>


<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

    <?php include 'header.php'; ?>

    <main class="main">

        <?php include 'user-profile-nav.php'; ?>

        <h5 style="position: relative; top: 4px;">Дневник
    </h5>
    <hr class="line" style="width: 1000px">

    <div class="diary-nav">
        <span style="margin-left: 55px;">Дата</span>
        <span style="margin-left: 70px;">Фильм</span>
        <span style="margin-left: 280px;">Год</span>
        <span style="margin-left: 48px;">Оценка</span>
        <span style="margin-left: 58px;">Лайк</span>
        <span style="margin-left: 35px;">Перечит.</span>
        <span style="margin-left: 25px;">Ревью</span>
        <span style="margin-left: 36px;">Ред.</span>



    </div>

        <ul class="diary-ul">
            <?php
            while ($diary = $result->fetch_assoc()) {
                $result_2 = mysqli_query($induction, "SELECT * FROM books WHERE id = " . $diary['book_id'] . ";");
                $book = $result_2->fetch_assoc();
                ?>
                <li class="diary-list">
                    <span class="diary-list-item" style="margin-left: 20px; width: 100px;"><? echo $diary['date']?></span>
                    <span class="diary-list-item" style="margin-left: 40px; width: 50px;"><a href="./book-profile.php?book_id=<?php echo $book['id'] ?>"><img src="./images/book-posters/<?php echo $book['poster'] ?>" style="height: 55px; border: 2px solid #157347; border-radius: 10px;" alt="Постер книги" /></a></span>
                    <span class="diary-list-item" style="margin-left: 5px; width: 260px;"><? echo $book['name']?></span>
                    <span class="diary-list-item" style="margin-left: width: 50px; text-align: center;"><? echo $book['year']?></span>
                    <span class="diary-list-item" style="margin-left: 30px; width: 90px; text-align: center;"><div>
                    <label style="<?php if ($diary['rate'] >= 1 ) echo 'color: #ffc107'?>">&#9733;</label>
                    <label style="<?php if ($diary['rate'] >= 2 ) echo 'color: #ffc107'?>">&#9733;</label>
                    <label style="<?php if ($diary['rate'] >= 3 ) echo 'color: #ffc107'?>">&#9733;</label>
                    <label style="<?php if ($diary['rate'] >= 4 ) echo 'color: #ffc107'?>">&#9733;</label>
                    <label style="<?php if ($diary['rate'] == 5 ) echo 'color: #ffc107'?>">&#9733;</label>
                    </div></span>
                    <span class="diary-list-item" style="margin-left: 30px; width: 50px; text-align: center;"><? echo ($diary['my_like']) ?  '<img src="./images/icons/from-like.png" style="height: 15px;" />' : "" ?></span>
                    <!-- <span class="diary-list-item" style="font-size: 30px;"><? //echo ($diary['my_like']) ?  "&#9829;" : "" ?></span> -->
                    <span class="diary-list-item" style="margin-left: 30px; width: 50px; text-align: center;"><? echo ($diary['reread']) ?  '<img src="./images/icons/reread.png" style="height: 17px;" />' : "" ?></span>
                    <span class="diary-list-item" style="margin-left: 30px; width: 50px; text-align: center;"><? echo ($diary['review']) ? '<img src="./images/icons/review.png" style="height: 20px;" />' : "" ?></span>
                    <span class="diary-list-item" style="margin-left: 30px; width: 50px; text-align: center;"><img src="./images/icons/edit.png" style="height: 20px;" /></span>
                </li>
                <?php
            }
            ?>
        </ul>

        

    </main>



    <?php include 'footer.php'; ?>

</body>

</html>