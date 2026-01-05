<?php
// Delete Parent Logic
if (isset($_GET['delete_parent_id'])) {
    $delete_parent_id = $_GET['delete_parent_id'];
    $delete_parent_sql = "DELETE FROM `parent` WHERE parent_id = '$delete_parent_id' ";
    if ($conn->query($delete_parent_sql)) {
        ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: 'Parent Record has been Deleted Successfully!',
                    icon: 'success'
                }).then(() => {
                    window.location.href = 'index.php?parent';
                });
            });
        </script>
        <?php
    } else {
        ?>
        <script>
            $(document).ready(function() {
                Swal.fire('Parent Record has not been Deleted', 'error');
            });
        </script>
        <?php
    }
}
?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-11"> 
            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark bg-gradient text-white p-3 text-center">
                    <h2 class="mb-0 my-heading" style="font-size: 28px;">Parents Management</h2>
                </div>
                
                <div class="card-body bg-white p-4">
                    <div class="mb-3">
                        <a href="index.php?add_parent" class="btn btn-outline-info"> 
                            <i class="fas fa-plus-square"></i> Add Parent
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover text-center my-table border" id="my-dataTable">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">Sr</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Kids</th>
                                    <th scope="col">Nid</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Account Verify</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $parent_sql = "SELECT * FROM `parent`";
                                $parent_result = $conn->query($parent_sql);
                                $sno = 1;
                                while ($parent_row = $parent_result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $sno++ ?></th>
                                        <td class="fw-bold"><?= $parent_row['parent_name'] ?></td>
                                        <td><?= $parent_row['parent_email'] ?></td>
                                        <td>
                                            <?php
                                            if (!empty($parent_row['kids'])) {
                                                $kids = explode(',', $parent_row['kids']);
                                                foreach ($kids as $kid) {
                                                    $kid = trim($kid);
                                                    $fetch_student_sql = "SELECT `student_name` FROM `students` WHERE student_id = '$kid'";
                                                    $fetch_student_result = $conn->query($fetch_student_sql);
                                                    
                                                 
                                                    if ($fetch_student_result && $fetch_student_result->num_rows > 0) {
                                                        $fetch_student_row = $fetch_student_result->fetch_assoc();
                                                        echo "<span class='badge bg-light text-dark border mb-1'>" . $fetch_student_row['student_name'] . "</span><br>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><?= $parent_row['nid'] ?></td>
                                        <td>
                                            <img src="admin_images/registration/<?= $parent_row['parent_pic'] ?>" alt="parent Image" height="60" width="70" class="rounded border shadow-sm">
                                        </td>
                                        <td>
                                            <span class="badge <?= ($parent_row['parent_verify'] == 'Active') ? 'bg-success' : 'bg-warning' ?>">
                                                <?= $parent_row['parent_verify'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-sm btn-warning mx-1" href="index.php?edit_parent_id=<?= $parent_row['parent_id'] ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger mx-1" href="index.php?delete_parent_id=<?= $parent_row['parent_id'] ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div> </div> </div> </div>
    </div>
</div>