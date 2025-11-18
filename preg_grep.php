<?php

$foods =array("pasta","steak","fish","potators");
$food=preg_grep("/^p/",$foods);
print_r($foods);

?>

<?php 
$delimitedText="jason+++gilmore+++++++columbus+++oh";
$fields=preg_split("/\++/",$delimitedText);
foreach($fields as $field) echo $field."<br>";




?>