<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "movie"; 


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8");
?>
