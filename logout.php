<?php
session_start();
session_destroy();
unset($_SESSION["uname"]);
unset($_SESSION["password"]);
header("Location:login.php");
?>