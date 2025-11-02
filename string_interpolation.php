<?php

$sports = "boxing";
echo "Jason's favorite sport is {$sports}.";


?>
<hr>

<?php

$output = "This is one line.\nAnd this is onther line. \r We can use a \t\there.we want to add \r carriage return";
echo $output;


?>
<hr>
<?php

$print = "hello";
print 'This string will' . $print. 'exactly as it\'s \n \\t declared.';



?>
<br>
<?php

$cities =["Dhaka"=>50000,"Cumilla"=>80000];
// $cities['Dhaka']= 50000;
echo "The population of Dhaka is {$cities['Dhaka']}.";

?>