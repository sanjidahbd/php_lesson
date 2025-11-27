<?php   include("db_config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,td,th{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

 <?php 
     
     if(isset($_POST['submit'])){
        extract($_POST);
         $sql="CALL Manufacturer_Insert('$name','$address','$contact_no')";
        // $sql="INSERT INTO manufacturer VALUES (NULL,'$name','$address','$contact_no')";
      
        $db-> query($sql);
        if($db->affected_rows){
            echo "<h4>Manufacturer Added Successfully</h4>";
            
        }
     }
     
      
     
     
     ?>
   
    <h3>Manufacturer Table Entry </h3>
    
    <form action="" method="post">
        
        Name:
        <input type="text" name="name" placeholder="Enter Name"><br>
        Address:
     <textarea name="address" id=""></textarea><br>
     Contact_no:
     <input type="number" name="contact_no"><br>
     <input type="submit" name="submit" value="Submit">
    </form>
    <h1>List of Current Manufacturer</h1>
    <table>
        <tr>
            <th>ID</th>
        <th>Name</th>
    <th>Address</th>
    <th>Action</th>
    </tr>
    <?php  $sql="SELECT*FROM manufacturer";
    $rawdata=$db->query($sql);
    while( $row =$rawdata->fetch_assoc()):
    
    ?>
    <tr>
      
 
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['address'] ?></td>

       <td><a onclick=" return confirm('Are You Sure To Delete')" href="deleted_manufacturer.php?id=<?php echo $row['id'];?>">Delete</a></td>
    </tr>
    <?php endwhile; ?>
    </table>
    <a href="product_view.php">Product View</a>

</body>
</html>