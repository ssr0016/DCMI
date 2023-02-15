<?php
session_start();
include "../module/connect_database.php";
$username=$_REQUEST['username'];
$current_password=$_REQUEST['password'];
$new_password=$_REQUEST['newpassword'];
$confirm_password=$_REQUEST['confirmpassword'];
$sql = "SELECT * from user where username = '$username'";
$result = $conn->query($sql);

if($new_password != $confirm_password){
    $_SESSION['login_error'] = "confirmation";
    header("Location: password.php");
}
else if ($result->num_rows > 0) {  
    $row = $result->fetch_assoc();
    if(password_verify($current_password,$row['password'])){
        $_SESSION['login_error'] = "updated";
        $id = $row['id'];
        $hash = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE user
        SET password='$hash'
        where id='$id'";
        $conn->query($sql);
        header("Location: ../");
    }
    else{
    $_SESSION['login_error'] = 'user';
    header("Location:password.php");   
    }
  
} else {
  $_SESSION['login_error'] = 'user';
  header("Location:password.php"); 
}



$conn->close();
/*

*/



?>