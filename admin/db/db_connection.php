<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "sep_dism";

$connection = mysqli_connect($host, $username, $password, $database);
?>