<?php
setcookie("user", $user["name"], time(), "/");
header("Location: /");
?>