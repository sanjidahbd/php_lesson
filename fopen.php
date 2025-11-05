<!-- <?php 
//read
 $fh =fopen("student.txt" ,"r");
 echo fgets($fh);

 while(!feof($fh)){
    echo fgets($fh)."<br>";

 }
 fclose($fh);

?>  -->

<?php 
//write
//  $fh =fopen("student1.txt" ,"w");
 $fh =fopen("student1.txt" ,"a"); //apeand

fwrite($fh,"Hello Bangladesh,How are you?\n");
$fh =fopen("student1.txt" ,"r");


 while(!feof($fh)){
    echo fgets($fh)."<br>";

 }
 fclose($fh);



?>