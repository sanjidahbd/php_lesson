<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admission - Motijheel Ideal School & College</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icons.min.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <style>
        /* চেকবক্স ও রেডিও বাটন কাস্টম সিএসএস */
        .small-check, .small-radio {
            width: 14px;
            height: 14px;
            vertical-align: middle;
            cursor: pointer;
        }
        .check-label, .radio-label {
            font-size: 13px;
            color: #555;
            cursor: pointer;
            vertical-align: middle;
            margin-right: 15px; /* অপশনগুলোর মাঝে ফাঁকা জায়গা */
        }
        #nid-error {
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }
    </style>

    <script src="assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php
// ডাটাবেস এবং হেডার ইনক্লুড
include_once('admin/partials/head.php');
include_once('admin/partials/_connection.php');

if (isset($_POST['add_student'])) {
    // ১. আইডি ও রোল জেনারেশন
    $res = $conn->query("SELECT MAX(student_id) as last_id FROM students");
    $row = $res->fetch_assoc();
    $stu_id = ($row['last_id']) ? $row['last_id'] + 1 : 1;
    
    $formatted_student_id = str_pad($stu_id, 4, '0', STR_PAD_LEFT);
    $student_class = $_POST['student_class'];
    $formatted_class_id = str_pad($student_class, 2, '0', STR_PAD_LEFT);
    $student_rollno = $formatted_student_id . "-SMHS-" . $formatted_class_id;
    
    $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $student_email = mysqli_real_escape_string($conn, $_POST['student_email']);
    $student_password = $_POST['student_password'];
    $student_cpassword = $_POST['student_cpassword'];
    $student_dob = $_POST['student_dob'];
    $student_phone = $_POST['student_phone'];
    $student_class_section = isset($_POST['student_class_section']) ? $_POST['student_class_section'] : NULL;
    $student_address = mysqli_real_escape_string($conn, $_POST['student_address']);
    $student_age = $_POST['student_age'];
    $student_gender = $_POST['student_gender'];
    $father_nid = mysqli_real_escape_string($conn, $_POST['nid']); 

    // ২. ইমেজ আপলোড
    $random_nums = strtotime("now");
    $student_pic = $random_nums . "_" . $_FILES['student_pic']['name'];
    $temp_pic = $_FILES['student_pic']['tmp_name'];
    $upload_dir = "admin/admin_images/registration/";

    if(!is_dir($upload_dir)){
        mkdir($upload_dir, 0777, true);
    }
    move_uploaded_file($temp_pic, $upload_dir . $student_pic);

    // ৩. ইমেইল চেক ও ডাটা ইনসার্ট
    $check_email = $conn->query("SELECT * FROM students WHERE student_email = '$student_email'");
    
    if ($check_email->num_rows > 0) {
        echo "<script>Swal.fire('Error!', 'This Email is already Registered!', 'error');</script>";
    } else {
        if ($student_password == $student_cpassword) {
            $sql = "INSERT INTO `students` (`student_rollno`, `student_name`, `student_email`, `student_password`, `student_dob`, `student_phone`, `student_class`, `student_section`, `student_address`, `student_age`, `student_gender`, `student_pic`, `father_nid`, `student_admission_date`) 
                    VALUES ('$student_rollno', '$student_name', '$student_email', '$student_password', '$student_dob', '$student_phone', '$student_class', '$student_class_section', '$student_address', '$student_age', '$student_gender', '$student_pic', '$father_nid', current_timestamp())";
            
            if ($conn->query($sql)) {
                echo "<script>
                    Swal.fire('Success!', 'Registration Completed Successfully!', 'success')
                    .then(() => { window.location.href = 'index.php'; });
                </script>";
            } else {
                echo "<script>Swal.fire('Database Error!', '" . $conn->error . "', 'error');</script>";
            }
        } else {
            echo "<script>Swal.fire('Error!', 'Passwords did not match!', 'error');</script>";
        }
    }
}
?>

<div id="admission-body">
    <div class="container my-5">
        <form action="" method="post" enctype="multipart/form-data" class="mt-5 p-4 shadow bg-white rounded border-top border-primary border-5">
            <h2 class="text-center mb-4 text-primary font-weight-bold">Student Admission Form</h2>
            
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label font-weight-bold">Full Name</label>
                    <input type="text" class="form-control" name="student_name" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label font-weight-bold">Email Address</label>
                    <input type="email" class="form-control" name="student_email" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Password</label>
                    <input type="password" class="form-control" id="pass1" name="student_password" required>
                    <div class="mt-2">
                        <input type="checkbox" class="small-check" id="check1" onclick="togglePass('pass1')"> 
                        <label for="check1" class="check-label">Show Password</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Confirm Password</label>
                    <input type="password" class="form-control" id="pass2" name="student_cpassword" required>
                    <div class="mt-2">
                        <input type="checkbox" class="small-check" id="check2" onclick="togglePass('pass2')"> 
                        <label for="check2" class="check-label">Show Password</label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Date of Birth</label>
                    <input type="date" class="form-control" name="student_dob" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Phone Number</label>
                    <input type="text" class="form-control" name="student_phone">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Select Class</label>
                    <select id="student_class" name="student_class" class="form-select" required>
                        <option value="">Choose Class</option>
                        <?php
                        $class_query = $conn->query("SELECT * FROM class");
                        while($row = $class_query->fetch_assoc()){
                            echo "<option value='".$row['class_id']."'>".$row['class_name']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3" id="section_container" style="display:none;">
                    <label class="form-label font-weight-bold">Select Section</label>
                    <select id="student_class_section" name="student_class_section" class="form-select">
                        <option value="">Choose Section</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label font-weight-bold">Address</label>
                    <textarea class="form-control" name="student_address" rows="2"></textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label font-weight-bold">Age</label>
                    <input type="number" class="form-control" name="student_age">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label font-weight-bold d-block">Gender</label>
                    <div class="mt-2">
                        <input type="radio" name="student_gender" value="Male" id="male" class="small-radio" checked> 
                        <label for="male" class="radio-label">Male</label>
                        
                        <input type="radio" name="student_gender" value="Female" id="female" class="small-radio"> 
                        <label for="female" class="radio-label">Female</label>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label font-weight-bold">Student Photo</label>
                    <input type="file" class="form-control" name="student_pic" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label font-weight-bold">Father's NID (Numbers Only)</label>
                    <input type="text" class="form-control" name="nid" id="nid_input" placeholder="e.g. 1995123456789" required>
                    <small id="nid-error"></small>
                </div>
            </div>

            <button type="submit" name="add_student" class="btn btn-primary btn-lg w-100 mt-3">Register Student</button>
        </form>
    </div>
</div>

<script src="assets/js/vendor/jquery-v2.2.4.min.js"></script>

<script>
    // পাসওয়ার্ড দেখানো/লুকানোর ফাংশন
    function togglePass(fieldId) {
        var field = document.getElementById(fieldId);
        field.type = (field.type === "password") ? "text" : "password";
    }

    $(document).ready(function() {
        // ক্লাস সিলেক্ট করলে অটোমেটিক সেকশন লোড হওয়া
        $('#student_class').on('change', function() {
            var classId = $(this).val();
            if (classId) {
                $.ajax({
                    url: 'admin/get_sections.php',
                    method: 'POST',
                    data: { class_id: classId },
                    success: function(response) {
                        $('#student_class_section').html(response);
                        $('#section_container').show();
                    }
                });
            } else {
                $('#section_container').hide();
            }
        });

        // NID ভ্যালিডেশন
        $('#nid_input').on('blur', function() {
            var nidRegex = /^[0-9]{10,17}$/;
            if ($(this).val() !== "" && !nidRegex.test($(this).val())) {
                $('#nid-error').text("Invalid NID! 10-17 digits only.").css("color", "red");
                $(this).val(""); 
            } else {
                $('#nid-error').text("");
            }
        });
    });
</script>

<?php include_once('admin/partials/footer.php'); ?>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>