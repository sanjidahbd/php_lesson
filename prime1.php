<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Prime Number Check</h3>
    <?php
    if(isset($_REQUEST['submit'])){
        $mynum = $_REQUEST['myform'];


        if($mynum==1){
            echo " $mynum Is not a prime number";
            exit;
        }

        if($mynum==2){
            echo " $mynum Is a prime number";
            exit;
        }

        if($mynum>2){
            for($i=2;$i<$mynum;$i++){
                if($mynum%$i==0){
                    echo" $mynum Is not a prime number";
                    exit;
                }
            }
        }
        echo" $mynum Is a prime number";
    }
    
    
    ?>
    

    <form action="">
        <input type="number" name="myform" placeholder="Enter Number"><br>
        <input type="submit" name="submit" value="check">
    </form>
</body>
</html>