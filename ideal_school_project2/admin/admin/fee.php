<?php
// Delete Fee Record
if (isset($_GET['delete_fee_id'])) {
    $delete_fee_id = mysqli_real_escape_string($conn, $_GET['delete_fee_id']);
    $delete_fee_sql = "DELETE FROM `fee` WHERE fee_id = '$delete_fee_id' ";
    if ($conn->query($delete_fee_sql)) {
?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: 'Fee Record has been Deleted Successfully!',
                    icon: 'success'
                }).then(() => {
                    window.location.href = 'index.php?fee';
                });
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            $(document).ready(function() {
                Swal.fire('Fee Record has not been Deleted', 'error');
            });
        </script>
<?php
    }
}
?>

<div class="row col-md-12 mx-auto my-5">
    <h1 class="text-center fs-1 mt-3 bg-dark bg-gradient p-2 my-heading" style="color:white; border-radius:10px;">Fee Records</h1>
    
    <div class="mb-3">
        <a href="index.php?add_fee" class="btn btn-outline-info mb-3 float-end"> <i class="fas fa-plus-square"> Add Fee</i></a>
        <nav class="navbar">
            <form method="post" class="d-flex">
                <select class="form-select" name="feeStatusFilter" id="feeStatusFilter">
                    <option selected disabled>Select Fee Status</option>
                    <option value="Unpaid">Unpaid</option>
                    <option value="Processing">Processing</option>
                    <option value="Paid">Paid</option>
                    <option value="All">All</option>
                </select>
                <button class="btn btn-success mx-2" name="fee_filer" type="submit">Filter</button>
            </form>
        </nav>
    </div>

    <table class="table mb-5 text-center my-table table-bordered table-hover" id="my-dataTable">
        <thead class="table-info">
            <tr>
                <th scope="col">Sr</th>
                <th scope="col">Class</th>
                <th scope="col">Student Name</th>
                <th scope="col">Fee Month</th>
                <th scope="col">Fee Amount</th>
                <th scope="col">Due Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Fee Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
     
            if (isset($_POST['fee_filer'])) {
                $fee_filer = $_POST['feeStatusFilter'];
                if ($fee_filer === "All") {
                    $fee_sql = "SELECT * FROM `fee` ORDER BY fee_id DESC";
                } else {
                    $fee_sql = "SELECT * FROM `fee` WHERE fee_status = '$fee_filer' ORDER BY fee_id DESC";
                }
            } else {
                $fee_sql = "SELECT * FROM `fee` ORDER BY fee_id DESC";
            }

            $fee_result = $conn->query($fee_sql);
            $sno = 1;

            if ($fee_result && $fee_result->num_rows > 0) {
                while ($fee_row = $fee_result->fetch_assoc()) {
            ?>
                    <tr>
                        <th scope="row"><?= $sno++ ?></th>
                        
                        <td>
                            <?php
                            $fee_class_id = $fee_row['f_class_id'];
                            $class_res = $conn->query("SELECT class_name FROM class WHERE class_id = '$fee_class_id'");
                            if ($class_res && $class_res->num_rows > 0) {
                                $c_row = $class_res->fetch_assoc();
                                echo $c_row['class_name'];
                            } else {
                                echo "<span class='text-muted'>Class Deleted</span>";
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            $fee_student_id = $fee_row['f_student_id'];
                            $student_res = $conn->query("SELECT student_name FROM students WHERE student_id = '$fee_student_id'");
                            if ($student_res && $student_res->num_rows > 0) {
                                $s_row = $student_res->fetch_assoc();
                                echo "<b>" . $s_row['student_name'] . "</b>";
                            } else {
                           
                                echo "<span class='badge bg-danger'>Student Removed</span>";
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            $fee_month = $fee_row['fee_month'];
                            $months = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                            echo (isset($months[$fee_month])) ? $months[$fee_month] : "N/A";
                            ?>
                        </td>

                        <td> <?= number_format($fee_row['fee_amount'], 2) ?> </td>
                        <td> <?= $fee_row['fee_due_date'] ?> </td>
                        <td> <?= $fee_row['fee_end_date'] ?> </td>
                        <td> 
                            <?php 
                                if($fee_row['fee_status'] == "Unpaid") echo "<span class='badge bg-danger'>Unpaid</span>";
                                elseif($fee_row['fee_status'] == "Processing") echo "<span class='badge bg-warning text-dark'>Processing</span>";
                                else echo "<span class='badge bg-success'>Paid</span>";
                            ?>
                        </td>
                        <td> <small><?= $fee_row['created_at'] ?></small> </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="index.php?edit_fee_id=<?= $fee_row['fee_id'] ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm" href="index.php?delete_fee_id=<?= $fee_row['fee_id'] ?>" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='10' class='text-center'>No Fee Records Found!</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>