<?php 
 
$host = "localhost";
$user = "root";
$pass = "";
$database = "sehat";
 
$conn = mysqli_connect($host, $user, $pass, $database);
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>