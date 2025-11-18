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
        </tr>
        <?php
        
        while($row=$result->fetch_object()){
        ?>
        <tr>
            <td><?php echo $row->employeeID;?></td>
            <td><?php echo $row->first_name;?></td>
            <td><?php echo $row->first_name; ?></td>
            <td><?php echo $row->birthdate;?></td>
            <td><?php echo $row->notes;?></td>
        </tr>
        <?php }?>

    </table><br>
    <a href="new_student.php">New_students</a>
   
    
</body>
</html>