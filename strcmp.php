<?php
$pswd="1234";
$pswd2="12345";
//  echo strcmp($pswd,$pswd2);
strcmp($pswd,$pswd2);
if(strcmp($pswd,$pswd2)!=0){
    echo"passwords do not match!";
}else{
    echo"password match!";
}
?>