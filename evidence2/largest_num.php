<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Largest Namber</h3>
    <?php
    
    if(isset($_REQUEST['click'])){
        $num = $_REQUEST['number'];
      $num_array= explode(",",$num);
    //   print_r($num);
    $max = $num_array[0];
    $min = $num_array[0];

    foreach($num_array as $n){
        if($n>$max){
            $max =$n;
        }
        if($n<$min){
            $min =$n;
        }
    }

    echo "The Largest Number is:" . $max . "<br>";
    echo "The Minimum Number is:" . $min  ;

    
    }
    
    
    ?>


    <form action="" method="request">
      <input type="text" name="number"><br>
      <input type="submit" name="click" value="submit">
        
    </form>
</body>
</html>