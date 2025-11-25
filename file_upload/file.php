<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>File Upload</h3>

    <?php 
    
    if(isset($_POST['upload'])){
        $filename=$_FILES['myfile']['name'];
        $destination="files/".$filename;
        $tempfile=$_FILES['myfile']['tmp_name'];
        $filesize=$_FILES['myfile']['size'];
        $maxsize=512000;
        $ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        $allowtypes=['jpeg','png','jpg'];
        $error=[];

        if($filesize>$maxsize){
            $error[]="File  size must be 500kb";
        }
        if(!in_array($ext,$allowtypes)){
            $error[]="File type must be jpeg,png,jpg";
        }
        if(count($error)>0){
          foreach($error as $errors) {
            echo $errors."<br>";
          } 
        }
        else{
           move_uploaded_file($tempfile,$destination);
           echo "<h2>Uploded file Successfully</h2>";
        }
    }
    
    
    
    
    ?>
   <form method="post" enctype="multipart/form-data">

<input type="file" name="myfile">
<input type="submit" name="upload" value="Upload">


   </form>
</body>
</html>