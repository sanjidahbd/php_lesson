<?php

if (isset($_POST['add_student'])) {
   
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-dark bg-gradient text-white p-3">
                    <h2 class="text-center mb-0 my-heading">Add New Student</h2>
                </div>
                <div class="card-body p-4 bg-white">
                    <form action="" id="student-registration" method="post" enctype="multipart/form-data">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="hidden" name="student_id">
                                <input type="text" class="form-control" placeholder="Enter Full Name" name="student_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" required class="form-control" placeholder="example@mail.com" name="student_email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Password</label>
                                <div class="input-group">
                                    <input type="password" required class="form-control" placeholder="Password" name="student_password" id="student_password">
                                    <span class="input-group-text bg-light">
                                        <input type="checkbox" class="form-check-input" onClick="myFunction()">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" required class="form-control" placeholder="Confirm Password" name="student_cpassword" id="student_cpassword">
                                    <span class="input-group-text bg-light">
                                        <input type="checkbox" class="form-check-input" onClick="myFunction1()">
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <small id="CheckPasswordMatch" class="fw-bold text-success"></small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">DOB</label>
                                <input type="date" required class="form-control" name="student_dob">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Phone</label>
                                <input type="text" class="form-control" placeholder="Mobile" name="student_phone">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Age</label>
                                <input type="number" class="form-control" placeholder="Age" name="student_age">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6" id="student_class_container">
                                <label for="student_class" class="form-label fw-bold">Select Class</label>
                                <select id="student_class" class="form-select" name="student_class" required>
                                    <option value="" selected>Select Class</option>
                                    <?php
                                    $class_sql = "SELECT * FROM `class`";
                                    $class_result = $conn->query($class_sql);
                                    while ($class_row = $class_result->fetch_assoc()) {
                                        echo "<option value='".$class_row['class_id']."'>".$class_row['class_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6" id="student_class_section_container">
                                <label for="student_class_section" class="form-label fw-bold">Select Section</label>
                                <select id="student_class_section" class="form-select" name="student_class_section">
                                    <option value="" selected>Select Section</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Address</label>
                            <input type="text" class="form-control" placeholder="Full Address" name="student_address">
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-md-4">
                                <label class="form-label fw-bold d-block">Gender</label>
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input" type="radio" id="male" value="Male" name="student_gender" checked>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="female" value="Female" name="student_gender">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Insert Picture</label>
                                <input type="file" class="form-control" name="student_pic">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Father NID</label>
                                <input type="text" class="form-control" placeholder="12345-1234567-1" name="nid" required>
                                <small id="nid-error-message"></small>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="add_student" id="add_student" class="btn btn-primary btn-lg px-5 shadow-sm">
                                <i class="fas fa-user-plus"></i> Register Student
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>