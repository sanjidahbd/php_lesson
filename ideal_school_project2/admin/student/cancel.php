<?php
session_start();
include_once('../partials/_connection.php');

?>
<div style="text-align:center; margin-top:50px; font-family: Arial;">
    <div style="color:#ffc107; font-size: 60px;">⚠</div>
    <h2 style="color:#856404;">Payment Cancelled</h2>
    <p>You have cancelled the payment process.</p>
    <p>No amount has been deducted from your account.</p>
    <br>
    <a href="index.php?fee" style="padding:12px 25px; background:#6c757d; color:#fff; text-decoration:none; border-radius:5px; font-weight:bold;">Go Back to Fee List</a>
</div>