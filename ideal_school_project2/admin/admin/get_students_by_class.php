<?php
// ১. ডাটাবেজ কানেকশন (এক ধাপ পেছনে partials ফোল্ডারে আছে)
include_once('../partials/_connection.php'); 

header('Content-Type: application/json');

if (isset($_POST['class_id'])) {
    $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
    
    // ডাটাবেজ কুয়েরি
    $query = "SELECT student_id, student_name FROM students WHERE class_id = '$class_id'";
    $result = $conn->query($query);

    $students = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    
    // JSON আউটপুট পাঠানো
    echo json_encode(['students' => $students]);
}
exit;
?>