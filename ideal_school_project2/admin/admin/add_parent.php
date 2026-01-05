<?php

if (isset($_POST['add_parent'])) {
    
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-11">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-dark bg-gradient text-white p-3">
                    <h2 class="text-center mb-0 my-heading">Parent Profile Registration</h2>
                </div>
                <div class="card-body p-4 bg-white">
                    <form action="" id="parent-registration" method="post" enctype="multipart/form-data">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter Full Name" name="parent_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" required class="form-control" placeholder="example@mail.com" name="parent_email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Password</label>
                                <div class="input-group">
                                    <input type="password" required class="form-control" placeholder="Password" name="parent_password" id="parent_password">
                                    <span class="input-group-text bg-light border-start-0">
                                        <input type="checkbox" class="form-check-input mt-0" onClick="myFunction()">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" required class="form-control" placeholder="Confirm Password" name="parent_cpassword" id="parent_cpassword">
                                    <span class="input-group-text bg-light border-start-0">
                                        <input type="checkbox" class="form-check-input mt-0" onClick="myFunction1()">
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <small id="CheckPasswordMatch" class="fw-bold"></small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kids" class="form-label fw-bold d-block">Select Kids</label>
                                <select id="kids" class="form-select multi-select w-100" name="kids[]" required multiple="multiple">
                                    <option value="" disabled>Search or Select Kid</option>
                                    <?php
                                    $student_sql = "SELECT * FROM `students`";
                                    $student_result = $conn->query($student_sql);
                                    while ($student_row = $student_result->fetch_assoc()) {
                                        echo "<option value='".$student_row['student_id']."'>".$student_row['student_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">NID Number</label>
                                <input type="text" class="form-control" placeholder="12345-1234567-1" name="nid" required>
                                <small id="nid-error-message" class="d-block mt-1"></small>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Insert Picture</label>
                            <input type="file" class="form-control" name="parent_pic" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="add_parent" id="add_parent" class="btn btn-primary btn-lg px-5 shadow-sm">
                                <i class="fas fa-save me-2"></i> Register Parent
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
       
        $('#kids').multiselect({
            buttonWidth: '100%',
            nonSelectedText: 'Select Kids',
            enableFiltering: true,
            templates: {
                button: '<button type="button" class="multiselect dropdown-toggle btn btn-outline-secondary text-start" data-bs-toggle="dropdown" aria-expanded="false"><span class="multiselect-selected-text"></span></button>',
            },
        });
    });

    
</script>