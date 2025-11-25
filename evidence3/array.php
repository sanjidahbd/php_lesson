<?php 
$countries=["bangladesh"=>"Dhaka","Austrellia"=>"delhi","japan"=>"toukeyo"];
ksort($countries);
foreach($countries as $key=>$value){
    echo "<pre>";
    echo "$key=>$value";
}





?>