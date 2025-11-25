<?php
$host = 'localhost';
$user = "root";
$password = "";
$database = "pwad68";
$db = new mysqli($host, $user, $password, $database);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
ob_start();
$admin_url = "http://localhost/sanjida/template/Admin/";
?>