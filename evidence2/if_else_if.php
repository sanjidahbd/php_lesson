<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
      if(isset($_REQUEST['click'])){
           $num = $_REQUEST['number'];
           $num ;
        


if ($num>=80) {
  echo $num . "Excellent";
}
elseif ($num>=70) {
    echo $num . "Good";
}

elseif($num>=50) {
    echo $num . "so so";
}
elseif ($num>=40) {
    echo $num . "pass";
}
elseif($num<100){
    echo $num . "Total Number: 100";
}
else{
    echo "Fail";
}




      }

    
    
    
    
    ?>



    <form action="" method="request">
      <input type="text" name="number"><br>
      <input type="submit" name="click" value="submit">
        
    </form>
</body>
</html>