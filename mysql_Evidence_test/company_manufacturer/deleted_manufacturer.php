<
<?php


$id= $_GET['id'];
$sql="DELETE FROM  manufacturer  WHERE id='$id'";
include_once("db_config.php");
$db->query($sql);
header("Location:manufacturer_entry.php");

?>