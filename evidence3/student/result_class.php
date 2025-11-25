<?php
class student {
    public $id;
    public $name;
    public $batch;
    public $file;

    function __construct($file){
        $this->file=$file;
    }
    function result($sid){
        $data=file($this->file);
        foreach($data as $line){
            list($id,$name,$batch,$result)=explode(" ",$line);
            if($sid==$id){
                return $id.",". $name.",".$batch.",".$result;

            }
        }
        return "Id Not Found";

    }
}





?>