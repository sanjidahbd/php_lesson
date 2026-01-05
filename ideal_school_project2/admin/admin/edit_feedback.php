<?php
include_once('../partials/_connection.php');
include_once("partials/admin_head.php");
include_once("partials/admin_topnav.php");
include_once("partials/admin_sidebar.php");


if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $res = $conn->query("SELECT * FROM feedback WHERE feedback_id = '$id'");
    $data = $res->fetch_assoc();
}


if (isset($_POST['update_feedback'])) {
    $teacher_id = mysqli_real_escape_string($conn, $_POST['f_teacher_id']);
    $class_id   = mysqli_real_escape_string($conn, $_POST['f_class_id']);
    $student_id = mysqli_real_escape_string($conn, $_POST['f_student_id']);
    $remarks    = mysqli_real_escape_string($conn, $_POST['remarks']);
    $status     = mysqli_real_escape_string($conn, $_POST['status']);

    $update_sql = "UPDATE `feedback` SET 
                   `f_teacher_id`='$teacher_id', 
                   `f_class_id`='$class_id', 
                   `f_student_id`='$student_id', 
                   `remarks`='$remarks', 
                   `status`='$status' 
                   WHERE `feedback_id` = '$id'";

    if ($conn->query($update_sql)) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script>
                window.onload = function() {
                    Swal.fire('Updated!', 'Feedback updated successfully!', 'success').then(() => {
                        window.location.href = 'index.php?view_feedback'; 
                    });
                };
              </script>";
    }
}
?>

<div class="content-wrapper" style="min-height: 100vh; display: flex; align-items: center;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-outline card-info shadow-lg">
                    <div class="card-header bg-dark text-center">
                        <h3 class="card-title float-none text-white fw-bold">Edit Feedback</h3>
                    </div>
                    <form action="" method="post">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Teacher</label>
                                    <select name="f_teacher_id" class="form-control" required>
                                        <?php
                                        $t_res = $conn->query("SELECT teacher_id, teacher_name FROM teachers");
                                        while($t_row = $t_res->fetch_assoc()){
                                            $selected = ($t_row['teacher_id'] == $data['f_teacher_id']) ? 'selected' : '';
                                            echo "<option value='".$t_row['teacher_id']."' $selected>".$t_row['teacher_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Class</label>
                                    <select name="f_class_id" id="class_select" class="form-control" required>
                                        <?php
                                        $c_res = $conn->query("SELECT * FROM class");
                                        while($c_row = $c_res->fetch_assoc()){
                                            $selected = ($c_row['class_id'] == $data['f_class_id']) ? 'selected' : '';
                                            echo "<option value='".$c_row['class_id']."' $selected>".$c_row['class_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Student</label>
                                    <select name="f_student_id" id="student_select" class="form-control" required>
                                        <?php
                                        $s_res = $conn->query("SELECT student_id, student_name FROM students WHERE class_id = '".$data['f_class_id']."'");
                                        while($s_row = $s_res->fetch_assoc()){
                                            $selected = ($s_row['student_id'] == $data['f_student_id']) ? 'selected' : '';
                                            echo "<option value='".$s_row['student_id']."' $selected>".$s_row['student_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="Positive" <?= ($data['status'] == 'Positive') ? 'selected' : '' ?>>Positive</option>
                                        <option value="Negative" <?= ($data['status'] == 'Negative') ? 'selected' : '' ?>>Negative</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold">Feedback Remarks</label>
                                <textarea name="remarks" class="form-control" rows="4" required><?= $data['remarks'] ?></textarea>
                            </div>
                        </div>
                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="index.php?view_feedback" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" name="update_feedback" class="btn btn-info fw-bold">Update Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("partials/admin_footer.php") ?>