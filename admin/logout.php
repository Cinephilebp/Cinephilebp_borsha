<?php 
session_start();
unset($_SESSION['ADMIN_ID']);

echo "<script>window.location.assign('index.php')</script>";

?>