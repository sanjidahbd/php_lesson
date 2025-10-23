<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3> Find Factorial Number</h3>
    <?php 
    
    if(isset($_REQUEST ["submit"])){
     $mynum = $_REQUEST ['mynum'];

    $output = 1;

    for($num=1; $num<=$mynum;$num++){
        $output *= $num;


    }
    echo $mynum . "is". $output . "total factorial number";

    }
    
    ?>




    <form action="" >
        <input type="number" name="mynum" placeholder="Enter a number"><br>
        <input type="submit" name="submit" value="check">
    </form>
</body>
</html>