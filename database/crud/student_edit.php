<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php 

 $id= $_REQUEST['id'];

 $sql="SELECT * FROM students WHERE employeeID='$id'";

 
include_once("db_config.php");
 $rowData=$db->query($sql);
 $row =$rowData->fetch_object();
// if(isset($_POST['submit'])){

if($_SERVER['REQUEST_METHOD']=='POST'){
    extract($_POST);
 
   $sql="UPDATE students SET first_name='$fname',last_name='$lname',birthdate='$dob',notes='$notes' WHERE employeeID='$id'";
   $db->query($sql);
   header("location:index.php");

}

?>
<body>
   <h3>Student Edit </h3>
  
    <form action="" method="post">
      
        FirstName:
        <input type="text" name="fname" placeholder="Enter Your First Name" value="<?php echo $row-> first_name;?>"><br>
        LastName:
        <input type="text" name="lname" placeholder="Enter Your Last Name" value="<?php echo $row-> last_name;?>"><br>
        Date of Birth:
        <input type="date" name="dob" placeholder="Enter Date"value="<?php echo $row->birthdate;?>"><br>
        Notes:<br>
    <textarea name="notes" placeholder="Enter Note"> <?php echo $row->notes;?></textarea><br><br>

    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="submit" name="submit" value="Update">






    </form>
    <a href="index.php">Students</a>
 
    
</body>
</html>

