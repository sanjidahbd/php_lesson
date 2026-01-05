<?php include_once('partials/admin_head.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <?php include_once('../admin/partials/admin_topnav.php') ?>
            <!-- <h2>top</h2> -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <?php include_once('partials/admin_sidebar.php'); ?>
            <!-- <h2>sidebar</h2> -->
        </div>
        <div class="col-md-10">
            <!-- <h2>Content</h2> -->
            <?php
            include_once('../partials/_connection.php'); 
        
        if (count($_GET) == 0 || isset($_GET['dashboard'])) {
            include_once('dashboard.php');
        }
            // Sections
            if (isset($_GET['section'])) {
                include_once('section.php');
            }
            if (isset($_GET['edit_section_id'])) {
                include_once('edit_section.php');
            }
            if (isset($_GET['delete_section_id'])) {
                include_once('section.php');
            }

            // Classes
            if (isset($_GET['class'])) {
                include_once('class.php');
            }
            if (isset($_GET['add_class'])) {
                include_once('add_class.php');
            }
            if (isset($_GET['delete_class_id'])) {
                include_once('class.php');
            }
            if (isset($_GET['edit_class_id'])) {
                include_once('edit_class.php');
            }

            // Subjects
            if (isset($_GET['subject'])) {
                include_once('subject.php');
            }
            if (isset($_GET['delete_subject_id'])) {
                include_once('subject.php');
            }
            if (isset($_GET['edit_subject_id'])) {
                include_once('edit_subject.php');
            }

            // Rooms
            if (isset($_GET['room'])) {
                include_once('room.php');
            }
            if (isset($_GET['delete_room_id'])) {
                include_once('room.php');
            }
            if (isset($_GET['edit_room_id'])) {
                include_once('edit_room.php');
            }

            // Period
            if (isset($_GET['period'])) {
                include_once('period.php');
            }
            if (isset($_GET['delete_period_id'])) {
                include_once('period.php');
            }
            if (isset($_GET['edit_period_id'])) {
                include_once('edit_period.php');
            }

            // Timetable
            if (isset($_GET['timetable'])) {
                include_once('timetable.php');
            }
            if (isset($_GET['delete_timetable_id'])) {
                include_once('timetable.php');
            }
            if (isset($_GET['edit_timetable_id'])) {
                include_once('edit_timetable.php');
            }
            if (isset($_GET['view_timetable'])) {
                include_once('view_timetable.php');
            }

            // Student
            if (isset($_GET['student'])) {
                include_once('student.php');
            }
            if (isset($_GET['add_student'])) {
                include_once('add_student.php');
            }
            if (isset($_GET['delete_student_id'])) {
                include_once('student.php');
            }
            if (isset($_GET['edit_student_id'])) {
                include_once('edit_student.php');
            }
            if (isset($_GET['view_student_id'])) {
                include_once('view_student.php');
            }

            // Teacher
            if (isset($_GET['teacher'])) {
                include_once('teacher.php');
            }
            if (isset($_GET['add_teacher'])) {
                include_once('add_teacher.php');
            }
            if (isset($_GET['delete_teacher_id'])) {
                include_once('teacher.php');
            }
            if (isset($_GET['edit_teacher_id'])) {
                include_once('edit_teacher.php');
            }
            if (isset($_GET['view_teacher_id'])) {
                include_once('view_teacher.php');
            }

            // Parent
            if (isset($_GET['parent'])) {
                include_once('parent.php');
            }
            if (isset($_GET['add_parent'])) {
                include_once('add_parent.php');
            }
            if (isset($_GET['delete_parent_id'])) {
                include_once('parent.php');
            }
            if (isset($_GET['edit_parent_id'])) {
                include_once('edit_parent.php');
            }

            // Logout
            if (isset($_GET['logout'])) {
                include_once('admin_logout.php');
            }

            // Admin Change Password
            if (isset($_GET['admin_change_password'])) {
                include_once('admin_change_password.php');
            }

            // View Exam
            if (isset($_GET['exam'])) {
                include_once('exam.php');
            }

            // Fees
            if (isset($_GET['add_fee'])) {
                include_once('add_fee.php');
            }
            if (isset($_GET['fee'])) {
                include_once('fee.php');
            }
            if (isset($_GET['delete_fee_id'])) {
                include_once('fee.php');
            }
            if (isset($_GET['edit_fee_id'])) {
                include_once('edit_fee.php');
            }

            // Notice
            if (isset($_GET['notice'])) {
                include_once('notice.php');
            }
            if (isset($_GET['delete_noticce_id'])) {
                include_once('notice.php');
            }
            if (isset($_GET['edit_notice_id'])) {
                include_once('edit_notice.php');
            }
            if (isset($_GET['delete_notice_id'])) {
                include_once('notice.php');
            }

            // Attendance
            if (isset($_GET['view_attendance'])) {
                include_once('view_attendance.php');
            }

            // Attendance
            if (isset($_GET['view_feedback'])) {
                include_once('view_feedback.php');
            }
            ?>
        </div>
    </div>
<?php include_once('partials/admin_footer.php'); ?>