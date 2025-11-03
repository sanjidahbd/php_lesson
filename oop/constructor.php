<?php 
class Fruit{
    public $name;
    public $color;

function __construct($name){
     echo $name ."<br>";
}
function __destruct(){
     echo "Red";
}


}
new Fruit("Apple");


?>