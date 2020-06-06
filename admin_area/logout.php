<?php

session_start();
$token = $_SESSION['token'];
session_destroy();
session_start();
$_SESSION['token'] = $token;

echo "<script>window.open('login.php','_self')</script>";

?>