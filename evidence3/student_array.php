<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $students=["alam"=>85,"sani"=>80,"ara"=>72];
    $maxscore=max($students);
    $topscore= array_search($maxscore , $students);
    echo"<table>";
    echo"<tr><th>Student name</th><th>Score</th>";
    foreach($students as $name=>$score){
        echo"<tr><td>$name</td><td>$score</td>";

    }
    echo "</table>";
    echo"Highest score is:".$maxscore."Name is".$topscore;

    
    
    ?>
</body>
</html>