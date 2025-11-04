<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
// //$_GET $_POST $_REQUEST
// echo "<pre>";
print_r($_REQUEST);
// echo "</pre>";

if(isset($_GET['submit'])){
    $Name = $_GET['Name'];
$Email = $_GET['Email'];
$phone = $_GET['phone'];


echo "Name" .": ". $Name .  "<br>";
echo "Email" . ": ". $Email . "<br>";
echo "phone" . ": ". $phone . "<br>";


}



?>
<h3>Registration Form</h3>
<form action="" mathod="get">
    Name:
    <input type="text" name="Name" placeholder="Enter Your Name"><br>
    Email:
    <input type="text"  name="Email"placeholder="Enter Your Email"><br>
    phone:
    <input type="text" name="phone" placeholder="Enter Your Phone"><br>
   <br> <input type="submit" name="submit" value="Submit">
</form>




    
</body>
</html>