<?php
$host="localhost";
$username="root";
$password="";
$database="";
$db=new mysqli($host,$username,$password,$database);
if($db->connect_error){
    die("Connection Failed".$db->connect_error);
}







?>