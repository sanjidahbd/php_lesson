<?php
$number =(float) 55;
echo $number . "<br>";
var_dump($number);




?>
<hr>
<?php
$number =(int) 55.6;
echo $number . "<br>";
var_dump($number);




?>
<hr>
<?php
$number =(int) "Today is saturday";
echo $number . "<br>";
echo gettype($number);




?>
<hr>
<?php
$txt =(bool) "Hello";
echo $txt . "<br>";
echo gettype($txt);




?>
<hr>
<?php
$txt =(array) 75;
echo $txt[0] . "<br>";
echo  gettype($txt);




?>
