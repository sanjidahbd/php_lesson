<?php


$id= $_GET['id'];
$sql="DELETE FROM students WHERE employeeID='$id'";
include_once("db_config.php");
$db->query($sql);
header("Location:index.php");

?>