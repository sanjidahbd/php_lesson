<?php 
include("db_config.php");
if(isset($_GET['id'])){
$sql="DELETE FROM manufacturer WHERE id=$id";

if ($db->query($sql)){
    echo "Suceess";
}else{
   echo "unsucess";
}
header("manufacturer_entry.php");
}

?>