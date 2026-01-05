<?php
session_start();

include_once('../partials/_connection.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    $fee_id = mysqli_real_escape_string($conn, $_POST['fee_id']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $student_id = isset($_SESSION['student_id']) ? $_SESSION['student_id'] : 'Guest';
    
  
    $tran_id = "TXN_" . uniqid(); 

    $update_sql = "UPDATE fee SET 
                   transaction_id = '$tran_id', 
                   fee_status = 'Processing' 
                   WHERE fee_id = '$fee_id'";
    $conn->query($update_sql);


    $post_data = array();
    
 
    $post_data['store_id'] = "schoo694f54f91cb2c"; 
    $post_data['store_passwd'] = "schoo694f54f91cb2c@ssl"; 
    
    $post_data['total_amount'] = $amount;
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = $tran_id;


    $base_url = "http://localhost/ideal_school_project/admin/student"; 
    $post_data['success_url'] = $base_url . "/success.php?fee_id=" . $fee_id;
    $post_data['fail_url'] = $base_url . "/fail.php?fee_id=" . $fee_id;
    $post_data['cancel_url'] = $base_url . "/cancel.php?fee_id=" . $fee_id;

 
    $post_data['cus_name'] = "Student ID: " . $student_id;
    $post_data['cus_email'] = "student@mail.com";
    $post_data['cus_add1'] = "Dhaka"; 
    $post_data['cus_city'] = "Dhaka";
    $post_data['cus_postcode'] = "1200";
    $post_data['cus_country'] = "Bangladesh";   
    $post_data['cus_phone'] = "01700000000";
    
  
    $post_data['shipping_method'] = "No";
    $post_data['num_of_item'] = "1";
    $post_data['product_name'] = "Monthly School Fee";
    $post_data['product_category'] = "Education";
    $post_data['product_profile'] = "general";

 
    $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";


    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $direct_api_url);
    curl_setopt($handle, CURLOPT_POST, 1);
    curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($post_data));
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);

    $content = curl_exec($handle);
    $error = curl_error($handle);
    $result = json_decode($content, true);
    curl_close($handle);

 
    if ($error) {
        echo "CURL Error: " . $error;
    } elseif (isset($result['status']) && $result['status'] == 'SUCCESS') {
        echo "<script>window.location.href='". $result['GatewayPageURL'] ."';</script>";
        exit;
    } else {
        echo "<h3>Payment Gateway Error!</h3>";
        if (isset($result['failedreason'])) {
            echo "Reason: " . $result['failedreason'];
        } else {
            echo "API Response: " . $content;
        }
    }
} 
?>