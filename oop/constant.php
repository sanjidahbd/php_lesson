<?php 
class goodBye{
    const MYMSG ="We Are Learing PHP  OOP <br>";
    const MYMSG2 ="We Are About Constant Using in OOP";
    function Info(){
       echo self::MYMSG2;
    }
}//End of class

 echo goodBye :: MYMSG ;//::-Scope Resulation Operator

 $obj1 =new goodBye;
 $obj1->Info();


?>