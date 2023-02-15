<?php
session_start();
$delete=$_SESSION['delete'];
include "../module/connect_database.php";

$sql = "SELECT * from sales where id = '$delete'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$item_id = $row['item_id'];
$bottle = $row['bottle'];
$item = $row['item'];

$sql = "SELECT * from remaining where item = '$item'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$remaining = $row['quantity'] + $bottle;


$sql = "UPDATE remaining 
SET quantity='$remaining'
where item='$item'";
$conn->query($sql);



$sql = "DELETE from sales where id = '$delete'";
$conn->query($sql);

$conn->close();

header("Location:list.php");
?>


