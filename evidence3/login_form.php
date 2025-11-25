<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Login Form</h3>
    <?php 
    
    if(isset($_POST['submit'])){
        $username=$_POST['username'];

        if(strlen($username)<4||strlen($username)>8===false){
            echo "Username must be 4 to 8 character . <br>";
        }
        if(strpos($username,"@")===false){
            echo "Username must ba add @ symbol .<br>";
        }

        else{
            echo "Login Successfully";
        }
    }
    
    ?>
    <form action="" method="post">
        Username:
        <input type="text" name="username" placeholder="Enter Your Username"><br>
        <input type="password" name="password" placeholder="Enter Your Password"><br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>