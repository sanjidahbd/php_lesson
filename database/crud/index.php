<?php include_once("db_config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,td,th{
            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>

</head>
<?php
$sql="SELECT * FROM students ORDER BY employeeID desc";
$result=$db->query($sql);
// $row=$result->fetch_assoc();
// $row=$result->fetch_array();


 







//  echo $row['employeeID'];
//  echo $row['first_name'];
//  echo $row['last_name'];

?>
<body>
    <table>
        <tr>
            <th>employeeID</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>Birth Date</th>
            <th>Notes</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        
        while($row=$result->fetch_object()){
        ?>
        <tr>
            <td><?php echo $row->employeeID;?></td>
            <td><?php echo $row->first_name;?></td>
            <td><?php echo $row->last_name; ?></td>
            <td><?php echo $row->birthdate;?></td>
            <td><?php echo $row->notes;?></td>
            <td><a href="student_edit.php?id=<?php echo $row->employeeID;?>">Edit</a></td>
            <td><a onclick=" return confirm('Are You Sure To Delete')" href="student_deleted.php?id=<?php echo $row->employeeID;?>">Deleted</a></td>
        </tr>
        <?php }?>

    </table><br>
    <!-- <?php
     $db->close();
     ?> -->
    <a href="new_student.php">New_students</a>
   
    
</body>
</html>