<?php
session_start();
require("connection.php");

unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['signin']);

session_destroy();

header('location:index.php');
exit;
?>
