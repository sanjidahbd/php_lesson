<?php

if (isset($_POST['generate_fee'])) {
    $sid = mysqli_real_escape_string($conn, $_POST['f_student_id']);
    $cid = mysqli_real_escape_string($conn, $_POST['f_class_id']);
    $month = mysqli_real_escape_string($conn, $_POST['fee_month']);
    
  
    $t_fee = !empty($_POST['tuition_fee']) ? $_POST['tuition_fee'] : 0;
    $l_fee = !empty($_POST['library_fee']) ? $_POST['library_fee'] : 0;
    $total_amount = $t_fee + $l_fee;

    $due_date = $_POST['fee_due_date'];
    $end_date = $_POST['fee_end_date'];
    $status = $_POST['fee_status']; 
    $created_at = date("Y-m-d H:i:s");

    $insert_sql = "INSERT INTO `fee` (f_student_id, f_class_id, fee_month, fee_amount, fee_due_date, fee_end_date, fee_status, created_at) 
                   VALUES ('$sid', '$cid', '$month', '$total_amount', '$due_date', '$end_date', '$status', '$created_at')";

    if ($conn->query($insert_sql)) {
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Success! Fee Added Successfully',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php?fee';
                }
            });
        </script>";
    } else {
        echo "<script>Swal.fire('Error!', 'Could not add fee record', 'error');</script>";
    }
}
?>

<div class="row col-md-10 mx-auto my-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center py-3">
            <h3 class="mb-0">Generate Student Fee</h3>
        </div>
        <div class="card-body p-4 bg-light">
            <form method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Select Student</label>
                        <select class="form-select" name="f_student_id" required>
                            <option value="" disabled selected>Choose Student</option>
                            <?php
                            $st_list = $conn->query("SELECT student_id, student_name FROM students ORDER BY student_name ASC");
                            while($st = $st_list->fetch_assoc()){
                                echo "<option value='".$st['student_id']."'>".$st['student_name']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Select Class</label>
                        <select class="form-select" name="f_class_id" required>
                            <option value="" disabled selected>Select Class</option>
                            <?php
                            $class_list = $conn->query("SELECT * FROM class");
                            while($cl = $class_list->fetch_assoc()){
                                echo "<option value='".$cl['class_id']."'>".$cl['class_name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Tuition Fee</label>
                        <input type="number" name="tuition_fee" class="form-control" placeholder="0.00" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Library Fee</label>
                        <input type="number" name="library_fee" class="form-control" placeholder="0.00">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Select Month</label>
                        <select class="form-select" name="fee_month" required>
                            <option value="" disabled selected>Select Month</option>
                            <?php 
                            $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                            foreach($months as $idx => $m) echo "<option value='".($idx+1)."'>$m</option>";
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Due Date</label>
                        <input type="date" name="fee_due_date" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">End Date</label>
                        <input type="date" name="fee_end_date" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold d-block">Fee Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fee_status" id="unpaid" value="Unpaid" checked>
                        <label class="form-check-label text-danger fw-bold" for="unpaid">Unpaid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fee_status" id="paid" value="Paid">
                        <label class="form-check-label text-success fw-bold" for="paid">Paid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fee_status" id="proc" value="Processing">
                        <label class="form-check-label text-warning fw-bold" for="proc">Processing</label>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" name="generate_fee" class="btn btn-primary px-5 btn-lg shadow">Create Fee Record</button>
                </div>
            </form>
        </div>
    </div>
</div>