<?php

session_start();
$token = $_SESSION['token'];
session_destroy();
session_start();
$_SESSION['token'] = $token;



echo "<script>window.open('nextindex.php','_self')</script>";

?>