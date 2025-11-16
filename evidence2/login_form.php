<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Login Registration Form</h3>
    <?php  

   if(isset($_POST['submit'])){

    $errors = array();
    $name=$_POST['username'];
    if(strlen($name)<4||strlen($name)>8){
        $errors[] = "user name must be between 4 to 8 ";

    }

    $email = $_POST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[] = "Email is not valid";
    }
    if(count($errors)>0){
        echo"<ul>";
        foreach($errors as $error){
            echo "<li>" . $error . "</li>";
            

    }
    echo"</ul>";
        }else{
            echo $name ."<br>";
            echo $email;
        }
 
    }  

   
    
    
    ?>



    <form action="" method="POST">
        <input type="text" name="username" placeholder="Enter Your Name"><br>
        <input type="text" name="email" placeholder="Enter Your Email"><br>
       
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>