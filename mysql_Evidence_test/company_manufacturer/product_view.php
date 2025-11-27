<?php include("db_config.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <style>
    table,tr,td,th{
        border:1px solid black;
        border-collapse: collapse;
      
    }
  </style>

</head>
<body>
    <?php
    
    if(isset($_POST['submit'])){
        extract($_POST);
      
       
    
    }
    ?>
    <h1> product List</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        <th>Price</th>
        <th>Company</th>
   
    
    </tr>
    <?php    $sql="SELECT * FROM product_list2";
   $rawdata= $db->query($sql);
    
    while( $row =$rawdata->fetch_assoc()):
    
    ?>
    <tr>
      
 
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['price'] ?></td>
    <td><?php echo $row['Company'] ?></td>

       
    </tr>
    <?php endwhile; ?>
   
    </table>
    <a href="manufacturer_entry.php">Manufacturer</a>
</body>
</html>