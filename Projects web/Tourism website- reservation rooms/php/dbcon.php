<?php 
$servername = "localhost";
$username = "denisa";
$password = "denisa";
$db_name = "calatoria";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($con, "utf8");
?>