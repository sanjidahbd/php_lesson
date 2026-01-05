<?php
session_start();


include_once('../partials/_connection.php'); 

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


 

$fee_id = isset($_GET['fee_id']) ? mysqli_real_escape_string($conn, $_GET['fee_id']) : null;


if (isset($_POST['status']) && $_POST['status'] == 'VALID') {
    
    
    $val_id = mysqli_real_escape_string($conn, $_POST['val_id']);
    $payment_type = mysqli_real_escape_string($conn, $_POST['card_type']); 
    $tran_id = mysqli_real_escape_string($conn, $_POST['tran_id']);
    $submit_date = date('Y-m-d H:i:s'); 

    $update_sql = "UPDATE fee SET 
                    fee_status = 'Paid', 
                    val_id = '$val_id', 
                    payment_method = '$payment_type', 
                    fee_submit_date = '$submit_date' 
                   WHERE fee_id = '$fee_id' AND transaction_id = '$tran_id'";
    
    if ($conn->query($update_sql)) {
        

        echo "<div style='text-align:center; margin-top:50px; font-family: Arial;'>
                <div style='color:#28a745; font-size: 60px;'>✔</div>
                <h2 style='color:#28a745;'>Payment Successful!</h2>
                <p>Your Transaction ID: <b>$tran_id</b></p>
                <p>Payment Method: <b>$payment_type</b></p>
                
                <br>
                <a href='index.php?fee' style='padding:12px 25px; background:#28a745; color:#fff; text-decoration:none; border-radius:5px; font-weight:bold;'>Back to Dashboard</a>
              </div>";
    } else {
        echo "Error updating database: " . $conn->error;
    }
} else {
    
    echo "<div style='text-align:center; margin-top:50px; font-family: Arial;'>
            <div style='color:#dc3545; font-size: 60px;'>✘</div>
            <h2 style='color:#dc3545;'>Payment Verification Failed!</h2>
            <p>Sorry, we could not verify your payment at this moment.</p>
            <br>
            <a href='index.php?fee' style='padding:12px 25px; background:#dc3545; color:#fff; text-decoration:none; border-radius:5px; font-weight:bold;'>Try Again</a>
          </div>";
}
?>