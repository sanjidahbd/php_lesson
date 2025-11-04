<?php 

class Fruit{
   private $name;
   private $color;
//setter function
  function set_name($name){
    $this->name = $name;
   

}
//setter function
  function set_color($color){
  
    $this->color = $color;

}
  function get_name_color(){
  
   echo "Name:" . $this->name . "<br>" . "Color:" . $this->color;

}
 


}
  $obj1 = new Fruit ;
  $obj1->set_name("Apple");
  $obj1->set_color("Red");
  $obj1->get_name_color();

//  var_dump($obj1);


?>