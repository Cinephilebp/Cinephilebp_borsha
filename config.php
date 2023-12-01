<?php 
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "cinephile";

$conn = mysqli_connect($hostname,$username,$password,$dbname) or die('Database connection failed');

?>