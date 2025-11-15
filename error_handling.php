<?php 

ini_set('display_errors' ,0 );
try{
    
 $fh =fopen("contact.txt","r" );
if(!$fh){
    throw new Exception("could not open the file!");
}

}catch(Exception $e){
    echo $e->getMessage();
}

?>