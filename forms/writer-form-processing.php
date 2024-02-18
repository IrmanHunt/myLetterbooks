<?php

$writer_name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$writer_bio = filter_var(trim($_POST['bio']), FILTER_SANITIZE_STRING);
$writer_portrait = filter_var(trim($_FILES['portrait']['name']), FILTER_SANITIZE_STRING);


echo $writer_name;
echo $writer_bio;
echo $writer_portrait;

$induction = mysqli_connect('localhost', 'root', '', 'register-bd');

$result = mysqli_query($induction, "INSERT INTO writers (name, bio, portrait) VALUES ('$writer_name', '$writer_bio', '$writer_portrait');");

move_uploaded_file($_FILES['portrait']['tmp_name'], __DIR__ . '\\..\\images\\writer-portraits\\' . $_FILES['portrait']['name']);


header("Location: /writers.php");

?>