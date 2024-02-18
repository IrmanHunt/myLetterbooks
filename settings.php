<?php
$induction = mysqli_connect('localhost', 'root', '', 'register-bd');
if (mysqli_connect_errno()) {
    echo "Ошибка подключениия";
}


$user_id = $_COOKIE['id'];
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

    <main class="main" style="flex-direction: column;">

        <h5 style="margin-top: 20px;">Настройки</h5>
        <hr class="line" style="width: 100%; margin-top: 10px;">

        <form action="settings-processing.php" method="post" style="text-align: left; margin-top: 15px;">

            <div class="form-group d-flex">
                <input type="text" class="form-control mr-2" name="newName" id="newName" placeholder="Новое имя"
                    required />
                <button type="submit" class="btn btn-success" name="newName">Сохранить</button>
            </div>

            <div class="form-group d-flex">
                <input type="text" class="form-control mr-2" name="newPassword" id="newPassword"
                    placeholder="Новый пароль" required />
                <button type="submit" class="btn btn-success" name="newPassword">Сохранить</button>
            </div>


            <div class=" form-group d-flex avatar-field">

                <label>
                    <input type="file" name="newAvatar" id="newAvatar" accept=".png">
                    <img src="./images/avatars/<?php echo $user_avatar; ?>" id="newAvatar" class="avatar-field"
                        style="margin: 0 83px 0 83px;" />
                </label>
                <button type="submit" class="btn btn-success" name="newAvatar">Сохранить</button>

            </div>

        </form>


    </main>

    <?php include 'footer.php'; ?>

</body>

</html>