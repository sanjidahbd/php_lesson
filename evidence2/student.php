<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <h3>Student Associative array</h3>
    <?php
  $students=["Eva"=>80,"Fahima"=>70,"Hatim"=>65,"Hurram"=>80];
  $maxscore=max($students);
  $topscore=array_search($maxscore,$students);
  echo"<table>";
  echo"<tr><th>Student Name</th><th>Score</th></tr>";
  foreach($students as $name=>$score){
    echo"<tr><td>$name</td><td>$score</td>";
  }
  echo "</table>";
  echo "Highest Score is:".$maxscore."Name is:".$topscore;
    
    ?>
</body>
</html>