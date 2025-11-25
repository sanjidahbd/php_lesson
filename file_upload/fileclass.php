<?php
class fileclass{
    public $fileinfo;
    public function __construct($x)
    {
        $this->fileinfo=$x;
    }
    public function upload(){
        $info=$this->fileinfo;
        $name=$info['name'];
        $tmpName=$info['tmp_name'];
        $filesize=$info;
        $allowedsize=512000;//500kb
        $allowedtypes=['jpg','png','pdf','docx'];
        $errors=array();
        $data=pathinfo($name);
        $ext=strtolower($data['extension']);
        if($filesize>$allowedsize){
            $errors[]="File size must be 500kb";

        }
        if(!in_array($ext,$allowedtypes)){
            $errors[]="File type must be jpg and png";
        }
        if()

    }

}




?>