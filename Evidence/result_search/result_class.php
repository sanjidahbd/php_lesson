<?php 
class student{
    public $id;
    public $name;
    public $batch;
    public $file;//propetry


    function __construct($file){
        $this->file=$file;
        //or $this->file="result_sheet.txt"; //constructor

    }
    function result($fid){
      $data =  file( $this->file);

      foreach($data as $line){
       list($id,$name,$batch,$result) = explode(" ", $line);

       if($fid == $id){
        return $id. " , "  . $name . " , " . $batch . " , " . $result;
       }

      }

    }

}

?>