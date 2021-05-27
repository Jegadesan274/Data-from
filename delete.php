<?php
unlink($_GET["name"]);
header("Location: editUser.php" . $_SERVER["localhost:3306"]);
?>