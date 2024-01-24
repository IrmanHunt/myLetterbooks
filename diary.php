<?php
$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
    echo "Ошибка подключениия";
}


$user_id = $_GET['user_id'];

$result = mysqli_query($induction, "SELECT * FROM diary WHERE user_id = $user_id;");

?>


<!DOCTYPE html>
<html lang="ru">

<?php include 'head.php'; ?>

<body>

    <?php include 'header.php'; ?>

    <?php include 'user-profile-nav.php'; ?>

    <main class="main">

        <ul>
            <?php
            while ($diary = $result->fetch_assoc()) {
                $result_2 = mysqli_query($induction, "SELECT * FROM books WHERE id = " . $diary['book_id'] . ";");
                $book = $result_2->fetch_assoc();
                ?>
                <li style="border: 2px solid #157347; border-radius: 10px; width: 500px;">
                    <? echo $diary['date'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $book['name'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $book['year'] ?>
                </li>
                <?php
            }
            ?>
        </ul>

    </main>



    <?php include 'footer.php'; ?>

</body>

</html>