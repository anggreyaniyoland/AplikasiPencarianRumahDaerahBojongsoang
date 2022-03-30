<?php
    session_start();
    error_reporting(0);
    $host     = 'localhost';
    $user     = 'root';
    $password = '';
    $db       = 'sehat';
    $con      = mysqli_connect($host, $user, $password, $db);
?>