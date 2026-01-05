<?php

$student_class = isset($_SESSION['student_class']) ? $_SESSION['student_class'] : null;
$student_id = isset($_SESSION['student_id']) ? $_SESSION['student_id'] : null;

if (!$student_id || !$student_class) {
    echo "<div class='alert alert-danger mx-5 my-5'>Error: User session not found. Please log in again.</div>";
    return; 
}


?>

<div class="row col-md-12 mx-auto my-5">
    <h1 class="text-center fs-1 mt-3 bg-primary bg-gradient p-2 my-heading" style="color:white; border-radius:10px;">My Fee Records</h1>
    
    <div class="table-responsive">
        <table class="table mb-5 text-center my-table table-bordered shadow-sm" id="my-dataTable">
            <thead class="table-info">
                <tr>
                    <th>Sr</th>
                    <th>Fee Month</th>
                    <th>Fee Amount</th>
                    <th>Due Date</th>
                    <th>End Date</th>
                    <th>Fee Status</th>
                    <th>Payment Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
                $fee_sql = "SELECT * FROM fee WHERE f_class_id = '$student_class' AND f_student_id = '$student_id' ORDER BY fee_id DESC";
                $fee_result = $conn->query($fee_sql);
                $sno = 1;

                if ($fee_result && $fee_result->num_rows > 0) {
                    while ($fee_row = $fee_result->fetch_assoc()) {
                        $status = $fee_row['fee_status'];
                ?>
                    <tr>
                        <td><?= $sno++ ?></td>
                        <td> 
                            <?php
                                $fee_month = $fee_row['fee_month'];
                                $months = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                echo (isset($months[$fee_month])) ? $months[$fee_month] : "N/A";
                            ?> 
                        </td>
                        <td><b><?= number_format($fee_row['fee_amount'], 2) ?> BDT</b></td>
                        <td><?= $fee_row['fee_due_date'] ?></td>
                        <td><?= $fee_row['fee_end_date'] ?></td>
                        <td>
                            <?php 
                            if($status == "Unpaid") echo "<span class='badge bg-danger'>Unpaid</span>";
                            elseif($status == "Processing") echo "<span class='badge bg-warning text-dark'>Processing</span>";
                            else echo "<span class='badge bg-success'>Paid</span>";
                            ?>
                        </td>
                        <td>
                            <?php if($status == "Unpaid") { ?>
                                <form action="ssl_pay.php" method="POST">
                                    <input type="hidden" name="fee_id" value="<?= $fee_row['fee_id'] ?>">
                                    <input type="hidden" name="amount" value="<?= $fee_row['fee_amount'] ?>">
                                    <button type="submit" name="pay_now" class="btn btn-primary btn-sm shadow-sm">
                                        <i class="fa fa-credit-card"></i> Pay Online
                                    </button>
                                </form>
                            <?php } elseif($status == "Processing") { ?>
                                <button class="btn btn-warning btn-sm disabled" title="Payment is under verification">
                                    <i class="fa fa-spinner fa-spin"></i> Processing
                                </button>
                            <?php } else { ?> 
                                <button class="btn btn-success btn-sm disabled">
                                    <i class="fa fa-check-circle"></i> Paid
                                </button>
                                <?php } ?>
                        </td>
                    </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='7' class='p-4'>No fee records found for your account.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>