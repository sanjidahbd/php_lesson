<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Check wheather a number is prime or not</h3>
    <?php
    if(isset($_REQUEST['submit'])){
    $mynum = $_REQUEST['mynum'];

    //find out prime

    if($mynum==1){
        echo "$mynum is not a prime number";
        exit;

    }

    
    if($mynum==2){
        echo "$mynum is  a prime number";
        exit;

    }

    if($mynum>2){

        for($i=2;$i<$mynum;$i++){
            if($mynum%$i ==0){

                echo "$mynum is not a prime number";
                exit;

            }
        }
    }//check number is bigger than 2
    echo "$mynum is  a prime number";

    }
    
    
    ?>



    <form action="" >
        <input type="number" name="mynum" placeholder="Enter a number"><br>
        <input type="submit" name="submit" value="check">
    </form>
</body>
</html>