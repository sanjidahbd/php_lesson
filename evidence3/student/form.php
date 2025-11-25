<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Student Result Form</h3>
    <?php
    if(isset($_REQUEST['submit'])){
        $stid=$_REQUEST['number'];

        include("result_class.php");
        $sheet=new student("result.txt");
        $result=$sheet->result($stid);
        echo $result;

    }
    
    
    
    
    
    ?>
    <form action="">
        <input type="number" name="number" value="Enter Your Number"><br>
        <input type="submit" name="submit" value="Check">
    </form>
</body>
</html>