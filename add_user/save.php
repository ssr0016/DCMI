<?php
include "../module/connect_database.php";

$username = 'admin';
$password = 'admin';
$hash = password_hash($password, PASSWORD_DEFAULT);
$type = 'Administrator';





$sql = "INSERT INTO user (
username,
password,
type) Values (
'$username',
'$hash',
'$type')";
$conn->query($sql);

$conn->close();






?>