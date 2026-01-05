<?php include_once('partials/teacher_head.php'); 
?>
<?php
// session_start();
// $site_url = 'http://localhost/youtube-sms/';
// if(isset($_SESSION['login']) && $_SESSION['login'] == TRUE)
// {
//   if(isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin')
//   {
//     $user_type = $_SESSION['user_type'];
//     header('Location: /sms/'.$user_type.'/dashboard.php');
//   }
// }
// else 
// {
//   header('Location: ../login.php');
// }
?>
    <div class="row">
        <div class="col-md-12">
            <!-- Topnav  -->
            <?php include_once('partials/teacher_topnav.php') 
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <!-- Sidebar  -->
            <?php include_once('partials/teacher_sidebar.php'); 
            ?>
        </div>
        <!-- Content  -->
        <div class="col-md-10">
            <?php
            include_once('../partials/_connection.php');
            // Dashboard

            // Exam
            if (isset($_GET['exam'])) {
                include_once('exam.php');
            }
            if (isset($_GET['add_exam'])) {
                include_once('add_exam.php');
            }
            if (isset($_GET['edit_exam_id'])) {
                include_once('edit_exam.php');
            }
            if (isset($_GET['delete_exam_id'])) {
                include_once('exam.php');
            }

            // Logout
            if (isset($_GET['teacher_logout'])) {
                include_once('teacher_logout.php');
            }

             // Teacher Change Ppassword
             if (isset($_GET['teacher_change_password'])) {
                include_once('teacher_change_password.php');
            }

             // Teacher Profile
             if (isset($_GET['teacher_profile'])) {
                include_once('teacher_profile.php');
            }

            // Notice
            if (isset($_GET['notice'])) {
                include_once('notice.php');
            }
            if (isset($_GET['view_notice_id'])) {
                include_once('view_notice.php');
            }
            if (isset($_GET['my_notice'])) {
                include_once('my_notice.php');
            }
            if (isset($_GET['edit_notice_id'])) {
                include_once('edit_notice.php');
            }
            if (isset($_GET['delete_notice_id'])) {
                include_once('my_notice.php');
            }

            // Attendance
            if (isset($_GET['add_attendance'])) {
                include_once('add_attendance.php');
            }
            if (isset($_GET['attendance'])) {
                include_once('attendance.php');
            }
            if (isset($_GET['edit_att_id'])) {
                include_once('edit_attendance.php');
            }
            if (isset($_GET['attendance'])) {
                include_once('attendance.php');
            }
            if (isset($_GET['delete_att_id'])) {
                include_once('attendance.php');
            }

            // Feedback
            if (isset($_GET['feedback'])) {
                include_once('feedback.php');
            }
            if (isset($_GET['edit_feedback_id'])) {
                include_once('edit_feedback.php');
            }
            if (isset($_GET['delete_feedback_id'])) {
                include_once('feedback.php');
            }

            // Timetable
            if (isset($_GET['timetable'])) {
                include_once('timetable.php');
            }
            ?>
        </div>
    </div>
<?php include_once('partials/teacher_footer.php'); 
?>