<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Check Prime Number</h3>
    <?php 
    if(isset($_REQUEST['submit'])){
        $num=$_REQUEST['number'];
        if($num==1){
            echo "$num is not a prime number";
            exit;

        }
        if($num==2){
            echo "$num is a prime number";
            exit;
        }
        if($num>2){
            for($n=2;$n<$num;$n++){
                if($num%$n==0){
                    echo "$num is not a prime number";
                    exit;
                }
            }
        }
        echo "$num is a prime number";
    }
    
    
    
    
    
    ?>
    <form action="">
        <input type="number" name="number" placeholder="Enter Number"><br><br>
        <input type="submit" name="submit" value="Check">
    </form>
</body>
</html>