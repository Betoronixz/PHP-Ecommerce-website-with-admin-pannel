<?php
session_start();
unset($_SESSION["admin_email"]);
header("Location:.\admin_login.php");
?>