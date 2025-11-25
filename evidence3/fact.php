<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3>Factorial Number</h3>
   <?php
   if(isset($_REQUEST['submit'])){
    $num=$_REQUEST['number'];
    $output=1;
    for($n=1;$n<=$num;$n++){
         $output *=$n;
    }
    echo $num ."'s total factorial is".$output;
   }
   
   
   ?>
   <form action="">
    <input type="number" name="number" placeholder="Enter Number"><br>
    <input type="submit" name="submit" value="check">
   </form>
</body>
</html>