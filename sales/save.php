<?php
include "../module/connect_database.php";

$day = date("Y-m-d", strtotime($_REQUEST['day']));
$month = date("m",strtotime($day));
$year = date("Y",strtotime($day));
$item = $_REQUEST['item'];
$bottle = $_REQUEST['bottle'];
$ppbottle = $_REQUEST['ppbottle'];
$tamount = $_REQUEST['tamount'];
$soldto = $_REQUEST['soldto'];
$platform = $_REQUEST['platform'];
$address = $_REQUEST['address'];
$area = $_REQUEST['area'];
$contact_no = $_REQUEST['contact_no'];

$sql = "SELECT * from remaining where item = '$item'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$item_id = $row['id'];
$remaining = $row['quantity'] - $bottle;
$cpbottle = $row['priceperbottle'];
$income = $tamount - ($cpbottle * $bottle);

$sql = "UPDATE remaining
SET quantity='$remaining'
where item = '$item'";
$conn->query($sql);

$sql = "INSERT INTO sales (
day,
item,
item_id,
bottle,
ppbottle,
tamount,
cpbottle,
income,
soldto,
month,
year,
platform,
address,
area,
contact_no) Values (
'$day',
'$item',
'$item_id',
'$bottle',
'$ppbottle',
'$tamount',
'$cpbottle',
'$income',
'$soldto',
'$month',
'$year',
'$platform',
'$address',
'$area',
'$contact_no')";
$conn->query($sql);

$conn->close();


header("Location:list.php");



?>