<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php 

if(isset($_POST['submit'])){
    // $fname=$_post['fname'];
    // $lname=$_post['lname'];
    // $dob=$_post['dob'];
    // $notes=$_post['notes'];
    extract($_POST);
    $sql="INSERT INTO students VALUES(NULL,'$fname','$lname','$dob','$notes')";
    include_once("db_config.php");
    $db->query($sql);
    if($db->affected_rows){
        echo"Inserted";
    }
    
}

?>
    <h3>New Student Entry</h3>
    <form action="" method="post">
        ID:
        <input type="text" name="id" placeholder="Enter Your ID"><br>
        FirstName:
        <input type="text" name="fname" placeholder="Enter Your First Name"><br>
        LastName:
        <input type="text" name="lname" placeholder="Enter Your Last Name"><br>
        Date of Birth:
        <input type="date" name="dob" placeholder="Enter Date"><br>
        Notes:
    <textarea name="notes" placeholder="Enter Note"></textarea><br>
    <input type="submit" name="submit" value="Submit">






    </form>
    <a href="students.php">Students</a>
</body>
</html>