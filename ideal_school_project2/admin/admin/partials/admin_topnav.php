<?php 
    $admin_name = $_SESSION['admin_name'];
?>
<nav class="navbar navbar-dark fixed-top shadow" style="background-color: #184c80ff; margin-left: 250px;">
    <a href="index.php?dashboard" class="navbar-brand col-sm-3 col-md-2">Admin Panel- Ideal School & College
        <span style="margin-left: 300px">Welcome <?= $admin_name ?></span>
    </a>
</nav>