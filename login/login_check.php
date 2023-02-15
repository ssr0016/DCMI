<?php
session_start();
include "../module/connect_database.php";
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$sql = "SELECT * from user where username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {  
	$row = $result->fetch_assoc();
	if(password_verify($password,$row['password'])){
  		$_SESSION['user'] = $row['type'];
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
 		header("Location:home.php");
  	}
  	else{
  	$_SESSION['login_error'] = 'true2';
  	header("Location:login.php");	
  	}
  
} else {
  $_SESSION['login_error'] = 'true2';
  header("Location:login.php");
  
}

$conn->close();

?>