<?php
session_start();
include_once('../partials/_connection.php');

?>
<div style="text-align:center; margin-top:50px; font-family: Arial;">
    <div style="color:#dc3545; font-size: 60px;">✘</div>
    <h2 style="color:#dc3545;">Payment Failed!</h2>
    <p>Unfortunately, your transaction could not be completed.</p>
    <p>Please check your card details or contact your provider.</p>
    <br>
    <a href="index.php?fee" style="padding:12px 25px; background:#007bff; color:#fff; text-decoration:none; border-radius:5px; font-weight:bold;">Try Again</a>
</div>