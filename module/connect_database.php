<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "dcmi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>