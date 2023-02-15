<?php
session_start();
include "../module/connect_database.php";
$id = $_SESSION['id']; 
$day = date("Y-m-d", strtotime($_REQUEST['day']));
$month = date("m",strtotime($day));
$year = date("Y",strtotime($day));
$item = $_REQUEST['item'];
$boxes = $_REQUEST['boxes'];
$perbox = $_REQUEST['perbox'];
$tquantity = $_REQUEST['tquantity'];
$priceperbox = $_REQUEST['priceperbox'];
$priceperbottle = $_REQUEST['priceperbottle'];
$tamount = $_REQUEST['tamount'];

	$sql = "UPDATE stocks 
	SET day='$day',
	item='$item',
	boxes='$boxes',
	perbox='$perbox',
	tquantity='$tquantity',
	priceperbox='$priceperbox',
	priceperbottle='$priceperbottle',
	tamount='$tamount',
	remaining='$tquantity',
	month='$month',
	year='$year'
	where id='$id'";
	$conn->query($sql);
       
	$conn->close();
    
    header("Location:list.php");
?>