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
    if(isset($_POST['submit'])) {
        $username=$_POST['username'];
        if(strlen($username)<4||strlen($username)>8===false){
            echo "Username must be 4 to 8 digit";
        }
        if(strpos($username,"@")===false){
            echo"<br>";
         
            echo" Username must use @ symbol";

        }
      else{
        echo"Login Successfully";

      }
       }
       
    


   
    
    
    ?>



    <form action="" method="POST">
        Username:
        <input type="text" name="username" ><br><br>
        Password:
        <input type="password" name="password" ><br>
       
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>