<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,td,tr{
            border: 1px solid black;
            border-collapse: collapse;
           
        }
    </style>
</head>
<body>
    

<h2>Form Validation</h2>
    <form action="" method="REQUEST">
        Name:
<input type="text" name="name" placeholder="Enter Your Name"><br><br>
Email Address:
<input type="email" name="email" placeholder="Enter Your Email"><br><br>
Skills:
<select  name="skills[]" multiple="multiple">
    <option value="c#">C#</option>
    <option value="javascript">Javascript</option>
    <option value="perl">Perl</option>
    <option value="php">Php</option>
    <option value="php">Mysql</option>
    
</select><br><br>
Language:
<input type="checkbox" name="languages[]" value="c#">C#
<input type="checkbox" name="languages[]" value="java">JAVA
<input type="checkbox" name="languages[]" value="phython">Phython<br><br><br>

<input type="submit" name="submit" value="Submit" ><br><br>

    </form>

    <?php 
    if(isset($_REQUEST['submit'])){
        $skills_output ="";
        $langs_output ="";
        $errors = array();
        //name
        if(!isset($_REQUEST['name'])||$_REQUEST['name']==""){
            $errors[]="You Must Enter Name";
        }else{
              $name = $_REQUEST["name"];

        }
      
        //email
        if(!isset($_REQUEST['email'])||$_REQUEST['email']==""){
            $errors[]="You Must Enter Email";
        }else{
             $email = $_REQUEST["email"];
             if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors[] ="Email is not Valid";
             }
        }
       

        //skills
       if(!isset($_REQUEST["skills"])){
        $errors[]="You must select one skill";
       
        

       }
       else{
         $skills = $_REQUEST["skills"]; 
        
     
              foreach($skills as $skill){
            $skills_output .= $skill . "," ;

        }
       }
       //language
       if(!isset($_REQUEST["languages"])) {
         $errors[]="You must select one language";
       }else{
          $langs = $_REQUEST["languages"]; 
          
        $lastLangkey = array_key_last($langs);
        foreach($langs as $key => $lang){
            if($key == $lastLangkey){
                  $langs_output .= $lang  ;
            }
          else{
             $langs_output .= $lang . "," ;
          }
        }

       }
      

        


      


  



    // echo "<pre>";
    // print_r($_REQUEST);
    // echo"Skills:";
    // print_r($_REQUEST['Skills']);
    // echo"Want to Learn:";
 // print_r ($_REQUEST['languages']);

if(count($errors)>0){
    echo"<ul>";
    foreach($errors as $err){
        echo "<li>" . $err . "</li>";

    }
    echo"</ul>";
}else{ ?>
<?php




?>
 <table>
        <tr>
            <th>
                Name:

            </th>
            <td>
                <?php echo $name; ?>

            </td>
        </tr>
        <tr>
            <th>
                Email:

            </th>
            <td>
                <?php echo $email; ?>

            </td>
        </tr>
        <tr>
            <th>
                Skills:

            </th>
            <td>
                <?php echo $skills_output; ?>

            </td>
        </tr>
        <tr>
            <th>
                language:

            </th>
            <td>
                <?php echo $langs_output; ?>

            </td>
        </tr>
    </table>

<?php
    }
    }
    ?>
   
</body>
</html>