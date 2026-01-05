<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('partials/_connection.php');

// আগে থেকে লগইন করা থাকলে রিডাইরেক্ট
if (isset($_SESSION['teacher_name'])) {
    header("location: teacher/index.php");
    exit;
}
if (isset($_SESSION['student_name'])) {
    header("location: student/index.php");
    exit;
}
if (isset($_SESSION['admin_name'])) {
    header("location: admin/index.php?teacher");
    exit;
}

// লগইন লজিক
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['login_email']);
    $password = mysqli_real_escape_string($conn, $_POST['login_password']);
    $type = $_POST['login_type'];

    // ১. Teacher Login
    if ($type == 1) {
        $sql = "SELECT * FROM `teachers` WHERE `teacher_email` = '$email'";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if ($row['teacher_verify'] == 'Disable') {
                echo "<script>Swal.fire('Disabled!', 'Account disabled.', 'info');</script>";
            } elseif ($row['teacher_password'] === $password) {
                $_SESSION['teacher_login'] = TRUE;
                $_SESSION['teacher_id'] = $row['teacher_id'];
                $_SESSION['teacher_name'] = $row['teacher_name'];
                $_SESSION['teacher_pic'] = $row['teacher_pic'];
                $_SESSION['teacher_gender'] = $row['teacher_gender'];
                echo "<script>window.location.href='teacher/index.php?teacher_profile'</script>";
                exit;
            } else { echo "<script>Swal.fire('Error!', 'Wrong Password!', 'error');</script>"; }
        } else { echo "<script>Swal.fire('Error!', 'Teacher not found!', 'error');</script>"; }
    } 

    // ২. Student Login
    elseif ($type == 2) {
        $sql = "SELECT * FROM `students` WHERE `student_email` = '$email'";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if ($row['student_password'] === $password) {
                $_SESSION['student_login'] = TRUE;
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['student_name'] = $row['student_name'];
                $_SESSION['student_rollno'] = $row['student_rollno'];
                $_SESSION['student_pic'] = $row['student_pic'];
                $_SESSION['student_class'] = $row['student_class'];
                echo "<script>window.location.href='student/index.php?student_profile'</script>";
                exit;
            } else { echo "<script>Swal.fire('Error!', 'Wrong Password!', 'error');</script>"; }
        } else { echo "<script>Swal.fire('Error!', 'Student not found!', 'error');</script>"; }
    }

    // ৩. Admin Login
   // ৩. Admin Login (সংশোধিত অংশ)
elseif ($type == 3) {
    $sql = "SELECT * FROM `admin` WHERE `admin_email` = '$email'";
    $res = $conn->query($sql);
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if ($row['admin_password'] === $password) {
            $_SESSION['admin_login'] = TRUE;
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_name'] = $row['admin_name'];
            
            // নিচের লাইনটি যোগ করা হয়েছে যা আপনার সমস্যার সমাধান করবে
            $_SESSION['admin_email'] = $row['admin_email']; 
            
            echo "<script>window.location.href='admin/index.php?dashboard'</script>";
            exit;
        } else { echo "<script>Swal.fire('Error!', 'Wrong Password!', 'error');</script>"; }
    } else { echo "<script>Swal.fire('Error!', 'Admin not found!', 'error');</script>"; }
}

    // ৪. Parent Login (সংশোধিত অংশ)
    elseif ($type == 4) {
        $sql = "SELECT * FROM `parent` WHERE `parent_email` = '$email'";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if ($row['parent_password'] === $password) {
                $_SESSION['parent_login'] = TRUE;
                $_SESSION['parent_id'] = $row['parent_id'];
                $_SESSION['parent_name'] = $row['parent_name'];
                $_SESSION['parent_pic'] = $row['parent_pic'];
                
                // ড্যাশবোর্ডে এরর সমাধান করার জন্য সেশনে 'kids' ডাটা রাখা হলো
                $_SESSION['kids'] = isset($row['kids']) ? $row['kids'] : "";

                echo "<script>window.location.href='parent/index.php?dashboard'</script>";
                exit;
            } else { echo "<script>Swal.fire('Error!', 'Wrong Password!', 'error');</script>"; }
        } else { echo "<script>Swal.fire('Error!', 'Parent not found!', 'error');</script>"; }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ideal School & College</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f2f5;
        }
        .login-card {
            width: 100%;
            max-width: 450px;
            padding: 40px;
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .company-logo {
            color: #225470;
            font-weight: 800;
            text-transform: uppercase;
        }
        .btn-login {
            height: 50px;
            background: linear-gradient(135deg, #225470 0%, #3a7bd5 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            width: 100%;
            transition: 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(34, 84, 112, 0.4);
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card shadow-lg text-center">
        <div class="mb-4">
            <h2 class="company-logo">Ideal School & College</h2>
            <p class="text-muted">Portal Login</p>
            <hr class="w-25 mx-auto">
        </div>

        <form method="post" class="text-start">
            <div class="mb-3">
                <label class="form-label fw-bold small text-muted">Email Address</label>
                <div class="input-group bg-light rounded-3 border">
                    <span class="input-group-text bg-transparent border-0"><i class="fas fa-envelope"></i></span>
                    <input type="email" required class="form-control border-0 bg-transparent" name="login_email" placeholder="Email">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold small text-muted">Password</label>
                <div class="input-group bg-light rounded-3 border">
                    <span class="input-group-text bg-transparent border-0"><i class="fas fa-key"></i></span>
                    <input type="password" required class="form-control border-0 bg-transparent" id="login_password" name="login_password" placeholder="Password">
                </div>
                <div class="mt-2">
                    <input type="checkbox" id="show-pass" onclick="showLoginPass()"> 
                    <label for="show-pass" class="small text-muted" style="cursor: pointer;">Show Password</label>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold small text-muted">Account Type</label>
                <div class="input-group bg-light rounded-3 border">
                    <span class="input-group-text bg-transparent border-0"><i class="fas fa-user-circle"></i></span>
                    <select class="form-select border-0 bg-transparent" name="login_type" required>
                        <option value="" disabled selected>Select Account Type</option>
                        <option value="1">Teacher</option>
                        <option value="2">Student</option>
                        <option value="3">Admin</option>
                        <option value="4">Parent</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-login" name="login">LOGIN <i class="fas fa-arrow-right ms-2"></i></button>
        </form>
    </div>
</div>

<script>
    function showLoginPass() {
        var x = document.getElementById("login_password");
        x.type = (x.type === "password") ? "text" : "password";
    }
</script>

</body>
</html>