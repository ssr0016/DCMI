<?php
include "../module/connect_database.php";

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

$sql = "SELECT * from remaining where item = '$item'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$remaining = $row['quantity'] + $tquantity;

$sql = "UPDATE remaining
SET quantity='$remaining'
where item = '$item'";
$conn->query($sql);

$sql = "INSERT INTO stocks (
day,
item,
boxes,
perbox,
tquantity,
priceperbox,
priceperbottle,
tamount,
remaining,
month,
year) Values (
'$day',
'$item',
'$boxes',
'$perbox',
'$tquantity',
'$priceperbox',
'$priceperbottle',
'$tamount',
'$tquantity',
'$month',
'$year')";
$conn->query($sql);

$conn->close();


header("Location:list.php");



?>