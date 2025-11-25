<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Maximun & Minimum Number</h3>
    <?php
    
    if(isset($_REQUEST['check'])){
        $data=$_REQUEST['number'];
       $num=explode(",",$data);
       $max=$num[0];
       $min=$num[0];
       foreach($num as $n){
        if($n>$max){
            $max=$n;
        }
        if($n<$min){
            $min=$n;
        }
       }
       echo "Max Num is:" . $max;
       echo "Min Num is:" . $min;

    }
    
    
    
    
    ?>
    <form action="">
        <input type="text" name="number" placeholder="Enter Number"><br>
        <input type="submit" name="check" value="Check" >
    </form>
</body>
</html>