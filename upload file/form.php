<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Upload File</h3>
    <?php
    if (isset($_POST['upload'])) {
        $fileinfo = $_FILES['myfile']['name'];
        $destination = "file/" . $fileinfo;
        $tempfile = $_FILES['myfile']['tmp_name'];
        $filesize = $_FILES['myfile']['size'];
        $allowsize = 512000;
        $ext = strtolower(pathinfo($fileinfo, PATHINFO_EXTENSION));
        $allowtype = ["jpeg", "png", "pdf"];
        $error = [];
        if ($filesize > $allowsize) {
            $error[] = "File size must be 500kb";
        }
        if (!in_array($ext, $allowtype)) {
            $error[] = "File type must be jpeg,png,pdf";
        }
        if (count($error) > 0) {
            foreach ($error as $errors) {
                echo $errors . "<br>";
            }
        } else {
            move_uploaded_file($tempfile, $destination);


            echo "<h2>File Uploded Successfully</h2>";
        }
    }






    ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" value="Upload" name="upload">


    </form>
</body>

</html>