<style>
    .d-none {
        display: none !important;
    }
</style>

<div class="row col-md-8 mx-auto my-5">
    <div class="container">
        <?php
        $parent_id = $_SESSION['parent_id'];
        $parent_sql = "SELECT * FROM `parent` WHERE parent_id='$parent_id'";
        $parent_result = $conn->query($parent_sql);
        $sno = 1;
        $parent_row = $parent_result->fetch_assoc();
        ?>
        <h1 class="text-center fs-1 bg-primary bg-gradient p-2 mt-3 my-heading">Parent Profile</h1>
        <div class="card shadow mt-3">
            <form method="post" enctype='multipart/form-data'>
                <table class="table mb-5 table-bordered">
                    <tr>
                        <th> Name </th>
                        <td>
                            <div class="d-flex justify-content-between">
                                <span class="mr-2"> <?= $parent_row['parent_name'] ?> </span>
                                <span class="btn btn-warning" id="name-edit"><i class="fa fa-edit"></i></span>
                            </div>
                            <div class="d-flex justify-content-start d-none" id="name">
                                <div class="form-group">
                                    <form action="" method="post">
                                        <input type="text" name="name" class="form-control" value="<?= $parent_row['parent_name'] ?>">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary m-2 update" id="age-update" name="name-update">Update</button>
                                    <button class="btn btn-sm btn-primary m-2" id="name-cancel">Cancel</button>
                                </div>
            </form>
        </div>
        </td>
        </tr>
        <tr>
            <th> Email </th>
            <td><?= $parent_row['parent_email'] ?></td>
        </tr>
        <tr>
        <tr>
            <th> Nid </th>
            <td>
                <div class="d-flex justify-content-between">
                    <span class="mr-2"> <?= $parent_row['nid'] ?> </span>
                    <span class="btn btn-warning" id="nid-edit"><i class="fa fa-edit"></i></span>
                </div>
                <div class="d-flex justify-content-start d-none" id="nid">
                    <div class="form-group">
                        <form action="" method="post">
                            <input type="text" name="nid" class="form-control" value="<?= $parent_row['nid'] ?>">
                    </div>
                    <div>
                        <button class="btn btn-sm btn-primary m-2 update" id="age-update" name="nid-update">Update</button>
                        <button class="btn btn-sm btn-primary m-2" id="nid-cancel">Cancel</button>
                    </div>
                    </form>
                </div>
            </td>
        </tr>
        </table>
        </form>
    </div>
</div>
</div>


<?php
if (isset($_POST['name-update'])) {
    $name = $_POST['name'];
    $name_sql = "UPDATE `parent` SET parent_name = '$name'  WHERE parent_id = '$parent_id'";
    if ($conn->query($name_sql)) {
        ?>
        <script>
        $(document).ready(function() {
            $(document).ready(function() {
                Swal.fire({
            
                    text: 'Parent Name has been Updated Successfully!',
                    icon: 'success'
                }).then(() => {
                        window.location.href = 'index.php?parent_profile';
                });
            })
        });
        </script>
        <?php
            } else {
            ?>
        <script>
        $(document).ready(function() {
            Swal.fire('Parent Name has not been Updated', 'error');
        });
        </script>
        <?php
            }
}
if (isset($_POST['nid-update'])) {
    $nid = $_POST['nid'];
    $nid_sql = "UPDATE `parent` SET nid = '$nid'  WHERE parent_id = '$parent_id'";
    if ($conn->query($nid_sql)) {
        ?>
        <script>
        $(document).ready(function() {
            $(document).ready(function() {
                Swal.fire({
                    
                    text: 'Parent nid has been Updated Successfully!',
                    icon: 'success'
                }).then(() => {
                        window.location.href = 'index.php?parent_profile';
                });
            })
        });
        </script>
        <?php
            } else {
            ?>
        <script>
        $(document).ready(function() {
            Swal.fire( 'Parent nid has not been Updated', 'error');
        });
        </script>
        <?php
            }
}
?>

<script>
    $(document).ready(function() {
        $("#name-edit").click(function(e) {
            $("#name").removeClass('d-none');
        });
        $("#name-cancel").click(function(e) {
            $("#name").addClass('d-none');
        });

        $("#nid-edit").click(function(e) {
            $("#nid").removeClass('d-none');
        });
        $("#nid-cancel").click(function(e) {
            $("#nid").addClass('d-none');
        });


    });

</script>