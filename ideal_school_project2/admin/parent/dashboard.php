<?php

// include('db_connection.php');
// session_start();
?>

<style>
    .student-card {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        margin: 10px;
        background-color: #fff;
        width: 90%;
    }

    .student-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .student-image {
        width: 100%;
        height: 400px;
        object-fit: cover; /* ইমেজ যাতে ফেটে না যায় */
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .student-info {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 10px;
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .student-card:hover .student-info {
        opacity: 1;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .student-card {
        animation: fadeIn 0.5s ease-out;
    }

    .my-h1 {
        text-align: center;
        font-size: 2rem;
        color: #fff;
        background-color: #007bff;
        padding: 20px 0;
        margin: 0;
        transition: transform 0.3s ease-in-out;
        width: 100%;
    }

    .my-h1:hover {
        transform: scale(1.02);
        background-color: #0056b3;
    }
</style>

<div class="container my-5">
    <div class="row my-5">
        <div class="col-12 mb-4">
            <div class="my-h1">Your Kids Account</div>
        </div>

        <?php
        
        if (isset($_SESSION['kids']) && !empty($_SESSION['kids'])) {
            
            $my_kids = $_SESSION['kids'];
        
            $students = explode(',', $my_kids);

            foreach ($students as $student_id) {
        
                $student_id = trim($student_id);
                
                if (!empty($student_id)) {
                    
                    $fetch_student_sql = "SELECT * FROM `students` WHERE student_id = '$student_id'";
                    $fetch_student_result = $conn->query($fetch_student_sql);

                    if ($fetch_student_result && $fetch_student_result->num_rows > 0) {
                        $fetch_student_row = $fetch_student_result->fetch_assoc();
                        $student_name = $fetch_student_row['student_name'];
                        $student_pic = $fetch_student_row['student_pic'];
                        ?>
                        
                        <div class="col-md-4">
                            <div class="student-card">
                                <a href="direct_access.php?student_id=<?= htmlspecialchars($student_id) ?>">
                                    <?php 
                                    
                                    $image_path = "../admin/admin_images/registration/" . $student_pic;
                                    ?>
                                    <img src="<?= $image_path ?>" alt="<?= htmlspecialchars($student_name) ?>" class="student-image">
                                </a>
                                <div class="student-info">
                                    <h3><?= htmlspecialchars($student_name) ?></h3>
                                    <p>ID: <?= htmlspecialchars($student_id) ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
            }
        } else {
            
            echo '<div class="col-12 text-center">
                    <div class="alert alert-info">No children accounts associated with your profile.</div>
                  </div>';
        }
        ?>
    </div>
</div>