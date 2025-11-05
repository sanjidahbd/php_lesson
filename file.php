<?php 

$data =file("users.txt");

// echo"<pre>";
// print_r($data);
foreach($data as $line){
    //  echo $line . "<br>";

  list($name,$email)= $info = explode (" ",$line);

//    print_r($info);
//    echo"<br>";

echo "Name: $name" . " Email: $email" ."<br>";
}

?>