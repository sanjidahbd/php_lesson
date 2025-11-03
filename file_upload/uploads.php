<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>File Upload Using PHP Procedural Coading</h3>
    <?php
    
        if(isset($_POST['upload'])){

          $filename = $_FILES['myfile']['name'];
          $destination = "files/" . $filename;
            
            $tempfile = $_FILES['myfile']['tmp_name'];
            $filesize = $_FILES['myfile']['size'];//Byte
            $maxsize = 108576; //1mb
          $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

          $allowedtypes =["jpg" ,"jpeg" ,"png"];
          $errors =[];

            if($filesize>$maxsize){
                 $errors[] = "<h1>File is too Large</h1>";
            } 

            if(!in_array($ext,$allowedtypes)){
                $errors[] = "<h1>JPG,PNG and JPEG is allowed</h1>";

            }
            if(count($errors)>0){
                foreach($errors as $error){
                    echo $error ."<br>";
                }

            }else{
                  move_uploaded_file($tempfile,$destination);
                 echo "<h1>Uploaded Sucessfully</h1>";
          
           
            }
               
            // echo "<br>";
            // echo $_FILES['myfile']['size'];
            // echo "<br>";
            // echo "<pre>";
            // print_r($_FILES);

        }
    
    
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" value="UPLOAD" name="upload">
    </form>

</body>
</html>