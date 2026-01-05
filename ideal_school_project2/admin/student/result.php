<?php 
    $title = 'Student Result'; 
    include_once('partials/student_head.php');
?>
<div class="container-fluid my-5">
    <div class="card shadow">
        <div class="card-header text-center bg-primary bg-gradient text-white">
            <h2 class="my-heading">STUDENT RESULT CARD</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered my-table" id="my-dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Subjects</th>
                            <th>Assignment (15)</th>
                            <th>Test (15)</th>
                            <th>Mid (20)</th>
                            <th>Final (50)</th>
                            <th>Total Obtained</th>
                            <th>Exam Held For</th>
                            <th>Percentage</th>
                            <th>Grade</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
        $student_class = $_SESSION['student_class'];
        $student_id = $_SESSION['student_id'];

  
        $class_sql = "SELECT subject_name FROM class WHERE class_id = '$student_class'";
        $class_result = $conn->query($class_sql);

        if ($class_result->num_rows > 0) {
            $class_row = $class_result->fetch_assoc();
            $subject_ids = explode(',', $class_row['subject_name']);

            foreach ($subject_ids as $sub_id) {
                $sub_id = trim($sub_id);

  
                $sub_name_sql = "SELECT subject_name FROM `subject` WHERE subject_id = '$sub_id'";
                $sub_name_res = $conn->query($sub_name_sql);
                
                if ($sub_name_res->num_rows > 0) {
                    $sub_row = $sub_name_res->fetch_assoc();
                    $subject_name = $sub_row['subject_name'];

                  
                    $marks_sql = "SELECT exam_type, obtained_marks, total_marks FROM exam WHERE e_student_id = '$student_id' AND e_subject_id = '$sub_id'";
                    $marks_result = $conn->query($marks_sql);

                    $asgn = '-'; $test = '-'; $mid = '-'; $final = '-';
                    $sum_obtained = 0;
                    $sum_total_marks = 0;
                    $has_data = false;

                    while ($m_row = $marks_result->fetch_assoc()) {
                        $has_data = true;
                        $mark = (int)$m_row['obtained_marks'];
                        $t_mark = (int)$m_row['total_marks'];

                        if($m_row['exam_type'] == 'Assignment') { $asgn = $mark; $sum_obtained += $mark; $sum_total_marks += $t_mark; }
                        if($m_row['exam_type'] == 'Test') { $test = $mark; $sum_obtained += $mark; $sum_total_marks += $t_mark; }
                        if($m_row['exam_type'] == 'Mid') { $mid = $mark; $sum_obtained += $mark; $sum_total_marks += $t_mark; }
                        if($m_row['exam_type'] == 'Final') { $final = $mark; $sum_obtained += $mark; $sum_total_marks += $t_mark; }
                    }

                    if (!$has_data) {
                        $percent_txt = "N/A";
                        $grade = "N/A";
                        $status = "Pending";
                        $bg = "bg-secondary";
                        $exam_held_for = "0";
                    } else {
                    
                        $percentage = ($sum_total_marks > 0) ? ($sum_obtained / $sum_total_marks) * 100 : 0;
                        $percent_txt = number_format($percentage, 2) . "%";
                        $exam_held_for = $sum_total_marks;

                      
                        if($percentage >= 80) $grade = 'A+';
                        else if($percentage >= 70) $grade = 'A';
                        else if($percentage >= 60) $grade = 'B';
                        else if($percentage >= 50) $grade = 'C';
                        else if($percentage >= 40) $grade = 'D';
                        else if($percentage >= 33) $grade = 'E';
                        else $grade = 'F';

                        $status = ($percentage >= 33) ? 'PASS' : 'FAIL';
                        $bg = ($status == 'PASS') ? 'bg-success' : 'bg-danger';
                    }
        ?>
                    <tr>
                        <td class="fw-bold text-start ps-3"><?= $subject_name ?></td>
                        <td><?= $asgn ?></td>
                        <td><?= $test ?></td>
                        <td><?= $mid ?></td>
                        <td><?= $final ?></td>
                        <td class="fw-bold text-primary"><?= $sum_obtained ?></td>
                        <td class="text-muted small"><?= $exam_held_for ?></td>
                        <td><?= $percent_txt ?></td>
                        <td><span class="badge bg-dark"><?= $grade ?></span></td>
                        <td><span class="badge <?= $bg ?>"><?= $status ?></span></td>
                    </tr>
        <?php
                }
            }
        } else {
            echo "<tr><td colspan='10' class='text-center py-5'>No subjects found for your class.</td></tr>";
        }
        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted small">
            * Note: Status is calculated based on 33% pass marks of the exams held so far.
        </div>
    </div>
</div>