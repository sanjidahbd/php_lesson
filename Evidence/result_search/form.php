<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3>Find Result</h3>
   <?php
   
   if(isset($_POST['search'])){
  $stid = $_POST['student_id'];

  include ("result_class.php");

 $sheet = new student("result_sheet.txt");
 $result= $sheet->result($stid);
 echo $result;
   }
   
   ?>
   <form action="" method="post">
    <input type="number" name="student_id">
    <input type="submit" name="search" value="Search">

   </form>
</body>
</html>