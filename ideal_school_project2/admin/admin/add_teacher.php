<?php

if (isset($_POST['add_teacher'])) {
    $teacher_name = $_POST['teacher_name'];
    $teacher_email = $_POST['teacher_email'];
    $teacher_password = $_POST['teacher_password'];
    $teacher_cpassword = $_POST['teacher_cpassword'];
    $teacher_dob = $_POST['teacher_dob'];
    $teacher_phone = $_POST['teacher_phone'];
    $teacher_subject = $_POST['teacher_subject'];
    $teacher_address = $_POST['teacher_address'];
    $teacher_age = $_POST['teacher_age'];
    $teacher_gender = $_POST['teacher_gender'];

    $random_nums = strtotime("now");
    $teacher_pic = $random_nums . "_" . $_FILES['teacher_pic']['name'];
    $temp_pic = $_FILES['teacher_pic']['tmp_name'];
    move_uploaded_file($temp_pic, "admin_images/registration/$teacher_pic");

    $check_sql = "SELECT * FROM teachers WHERE teacher_email = '$teacher_email' ";
    $check_result = $conn->query($check_sql);
    $check_count = mysqli_num_rows($check_result);
    
    if ($check_count > 0) {
        echo "<script>$(document).ready(function() { Swal.fire('Registration Failed!', 'Email already Registered', 'error') });</script>";
    } else {
        if ($teacher_password == $teacher_cpassword) {
            $insert_teacher_sql = "INSERT INTO `teachers` (`teacher_name`, `teacher_email`, `teacher_password`, `teacher_dob`,`teacher_phone`, `teacher_subject`, `teacher_address`, `teacher_age`,`teacher_gender`, `teacher_pic`,  `teacher_joining_date`) VALUES ('$teacher_name', '$teacher_email', '$teacher_password', '$teacher_dob','$teacher_phone', '$teacher_subject', '$teacher_address', '$teacher_age','$teacher_gender', '$teacher_pic', current_timestamp());";
            if ($conn->query($insert_teacher_sql)) {
                echo "<script>$(document).ready(function() { Swal.fire({ text: 'Teacher Added Successfully!', icon: 'success' }).then(() => { window.location.href = 'index.php?teacher'; }); });</script>";
            }
        } else {
            echo "<script>$(document).ready(function() { Swal.fire('Error!', 'Passwords do not match', 'error') });</script>";
        }
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-10">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-dark bg-gradient text-white p-3">
                    <h3 class="text-center mb-0 my-heading">Add New Teacher</h3>
                </div>
                <div class="card-body p-4 bg-white">
                    <form action="" id="teacher-registration" method="post" enctype="multipart/form-data">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter Full Name" name="teacher_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" placeholder="Email Address" name="teacher_email" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="teacher_password" id="teacher_password" required>
                                    <span class="input-group-text bg-light">
                                        <input type="checkbox" class="form-check-input" onClick="myFunction()">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="teacher_cpassword" id="teacher_cpassword" required>
                                    <span class="input-group-text bg-light">
                                        <input type="checkbox" class="form-check-input" onClick="myCFunction()">
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <small id="CheckPasswordMatch" class="fw-bold"></small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">DOB</label>
                                <input type="date" class="form-control" name="teacher_dob" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Phone</label>
                                <input type="text" class="form-control" placeholder="Mobile Number" name="teacher_phone" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Subject</label>
                                <select class="form-select" name="teacher_subject" required>
                                    <option value="" selected>Select Subject</option>
                                    <?php
                                    $subject_sql = "SELECT * FROM `subject`";
                                    $subject_result = $conn->query($subject_sql);
                                    while ($subject_row = $subject_result->fetch_assoc()) {
                                        echo "<option value='".$subject_row['subject_id']."'>".$subject_row['subject_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Address</label>
                            <textarea class="form-control" placeholder="Current Address" name="teacher_address" rows="2"></textarea>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Age</label>
                                <input type="number" class="form-control" name="teacher_age">
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="form-label fw-bold d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="Male" name="teacher_gender" id="male" checked>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="Female" name="teacher_gender" id="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-bold">Teacher Picture</label>
                                <input type="file" class="form-control" name="teacher_pic" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="add_teacher" class="btn btn-primary btn-lg px-5 shadow-sm">
                                <i class="fas fa-user-plus"></i> Register Teacher
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   
    function myFunction() {
        var x = document.getElementById("teacher_password");
        x.type = x.type === "password" ? "text" : "password";
    }
    function myCFunction() {
        var cx = document.getElementById("teacher_cpassword");
        cx.type = cx.type === "password" ? "text" : "password";
    }
    function checkPasswordMatch() {
        var password = $("#teacher_password").val();
        var confirmPassword = $("#teacher_cpassword").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").html("❌ Passwords do not match!").css("color", "red");
        else
            $("#CheckPasswordMatch").html("✅ Passwords match.").css("color", "green");
    }
    $(document).ready(function() {
        $("#teacher_cpassword").keyup(checkPasswordMatch);
    });
</script>