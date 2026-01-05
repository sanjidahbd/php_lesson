<?php
// Delete Exam Logic (আপনার আগের কোড ঠিক আছে)
if (isset($_GET['delete_exam_id'])) {
    $delete_exam_id = $_GET['delete_exam_id'];
    $delete_exam_sql = "DELETE FROM `exam` WHERE exam_id = '$delete_exam_id' ";
    if ($conn->query($delete_exam_sql)) {
        echo "<script>$(document).ready(function() { Swal.fire({ text: 'Exam Deleted Successfully!', icon: 'success' }).then(() => { window.location.href = 'index.php?exam'; }); });</script>";
    }
}
?>

<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-md-12">
            <div class="card shadow border-0">
                <div class="card-header bg-dark bg-gradient text-white p-3">
                    <h1 class="text-center mb-0 fs-2 my-heading">Exams Records</h1>
                </div>
                <div class="card-body p-0"> <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0 text-center my-table" id="my-dataTable">
                            <thead class="table-info">
                                <tr>
                                    <th class="small">Sr</th>
                                    <th class="small">Teacher</th>
                                    <th class="small">Student</th>
                                    <th class="small">Class</th>
                                    <th class="small">Subject</th>
                                    <th class="small">Exam</th>
                                    <th class="small">Type</th>
                                    <th class="small">Total</th>
                                    <th class="small">Obtained</th>
                                    <th class="small">%</th>
                                    <th class="small">Grade</th>
                                    <th class="small">Status</th>
                                    <th class="small">Date</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                $exam_sql = "SELECT * FROM `exam`";
                                $exam_result = $conn->query($exam_sql);
                                $sno = 1;
                                while ($exam_row = $exam_result->fetch_assoc()) {
                                    // তথ্য সংগ্রহের লজিক (আগের মতই)
                                    $exam_teacher_id = $exam_row['e_teacher_id'];
                                    $teacher_res = $conn->query("SELECT teacher_name, teacher_gender FROM teachers WHERE teacher_id = '$exam_teacher_id'")->fetch_assoc();
                                    $gender_prefix = ($teacher_res['teacher_gender'] === 'Male') ? 'Sir ' : 'Miss ';

                                    $exam_student_id = $exam_row['e_student_id'];
                                    $student_name = $conn->query("SELECT student_name FROM students WHERE student_id = '$exam_student_id'")->fetch_assoc()['student_name'];

                                    $total = $exam_row['total_marks'];
                                    $obtained = $exam_row['obtained_marks'];
                                    $percentage = ($total > 0) ? (($obtained / $total) * 100) : 0;

                                    // Grade calculation logic... (আগের মতই)
                                    if ($percentage >= 90) $grade = 'A+';
                                    else if ($percentage >= 80) $grade = 'A';
                                    else if ($percentage >= 70) $grade = 'B+';
                                    else if ($percentage >= 60) $grade = 'B';
                                    else if ($percentage >= 50) $grade = 'C';
                                    else $grade = 'F';

                                    $status = ($percentage >= 50) ? 'PASS' : 'FAIL';
                                    $status_class = ($status === 'PASS') ? 'bg-success' : 'bg-danger';
                                ?>
                                    <tr>
                                        <td><?= $sno++ ?></td>
                                        <td class="small fw-bold"><?= $gender_prefix . $teacher_res['teacher_name'] ?></td>
                                        <td class="small"><?= $student_name ?></td>
                                        <td><?= $conn->query("SELECT class_name FROM class WHERE class_id = '{$exam_row['e_class_id']}'")->fetch_assoc()['class_name'] ?></td>
                                        <td><?= $conn->query("SELECT subject_name FROM `subject` WHERE subject_id = '{$exam_row['e_subject_id']}'")->fetch_assoc()['subject_name'] ?></td>
                                        <td class="small"><?= $exam_row['exam_name'] ?></td>
                                        <td class="small"><?= $exam_row['exam_type'] ?></td>
                                        <td><?= $total ?></td>
                                        <td><?= $obtained ?></td>
                                        <td class="fw-bold"><?= number_format($percentage, 1) ?>%</td>
                                        <td><span class="badge bg-secondary"><?= $grade ?></span></td>
                                        <td><span class="badge <?= $status_class ?> bg-gradient px-3"><?= $status ?></span></td>
                                        <td class="small"><?= $exam_row['exam_date'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>