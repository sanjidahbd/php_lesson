<?php 
//Numeric indexed array
$countries =["Bangladesh"=>"Dhaka","India"=>"Delhi","Pakistant"=>"Islamabad","Nepal"=>"Kathmondu","USA"=>"Newyork"];
 krsort($countries);
foreach($countries as $key=>$value){
   
    echo"<pre>";
    echo "$key => $value";
 

}

// ksort($countries);
// rsort($countries);



?>