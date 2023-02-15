<?php
session_start();
include "../module/connect_database.php";
$id = $_SESSION['id'];
$platform = $_REQUEST['platform'];
$address = $_REQUEST['address'];
$area = $_REQUEST['area'];
$contact_no = $_REQUEST['contact_no'];

	$sql = "UPDATE sales 
	SET platform='$platform',
	address = '$address',
	area = '$area',
	contact_no = '$contact_no'
	where id='$id'";
	$conn->query($sql);
       
	$conn->close();
    
    header("Location:list.php");
?>