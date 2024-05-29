<?php
$servername = "localhost";
// $servername = "192.168.107.138";
$username = "root";
$password = "a1b2c3d$";
$database = "pro-check";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>