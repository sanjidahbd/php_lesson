<?php

$total_students = 150;
$total_teachers = 25;
$total_parents = 120;
$total_classes = 10;
?>

<style>
    .dashboard-wrapper {
        padding: 40px 20px;
        background-color: #f8f9fa;
    }
    .stat-card {
        border: none;
        border-radius: 15px;
        transition: all 0.3s ease;
        position: relative;
        color: white;
    }
    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    .card-icon {
        font-size: 3rem;
        position: absolute;
        right: 15px;
        bottom: 10px;
        opacity: 0.2;
    }
    .welcome-banner {
        background: linear-gradient(135deg, #225470 0%, #3a7bd5 100%);
        border-radius: 15px;
        padding: 30px;
        color: white;
        margin-bottom: 40px;
    }
</style>

<div class="dashboard-wrapper">
    <div class="container-fluid">
        
        <div class="welcome-banner shadow-sm">
            <h1 class="fw-bold">Welcome Back, Admin!</h1>
            <p class="mb-0">Ideal School & College Management System (Preview Mode)</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card stat-card bg-primary shadow-sm h-100">
                    <div class="card-body p-4">
                        <h6 class="text-uppercase fw-bold small">Total Students</h6>
                        <h1 class="display-4 fw-bold mb-0"><?= $total_students ?></h1>
                        <i class="fas fa-user-graduate card-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card bg-success shadow-sm h-100">
                    <div class="card-body p-4">
                        <h6 class="text-uppercase fw-bold small">Total Teachers</h6>
                        <h1 class="display-4 fw-bold mb-0"><?= $total_teachers ?></h1>
                        <i class="fas fa-chalkboard-teacher card-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card bg-info shadow-sm h-100">
                    <div class="card-body p-4">
                        <h6 class="text-uppercase fw-bold small">Total Parents</h6>
                        <h1 class="display-4 fw-bold mb-0"><?= $total_parents ?></h1>
                        <i class="fas fa-users card-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stat-card bg-warning shadow-sm h-100">
                    <div class="card-body p-4">
                        <h6 class="text-uppercase fw-bold small">Total Classes</h6>
                        <h1 class="display-4 fw-bold mb-0"><?= $total_classes ?></h1>
                        <i class="fas fa-school card-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-clock me-2 text-primary"></i>Recently Added Students</h5>
                        <button class="btn btn-sm btn-outline-primary rounded-pill">View All</button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Class</th>
                                        <th class="pe-4 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4 text-muted">#101</td>
                                        <td class="fw-bold">Rahim Ahmed</td>
                                        <td>rahim@example.com</td>
                                        <td><span class="badge bg-light text-dark border">Class 10</span></td>
                                        <td class="pe-4 text-end">
                                            <button class="btn btn-sm btn-light"><i class="fas fa-eye"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4 text-muted">#102</td>
                                        <td class="fw-bold">Sumaiya Akter</td>
                                        <td>sumaiya@example.com</td>
                                        <td><span class="badge bg-light text-dark border">Class 9</span></td>
                                        <td class="pe-4 text-end">
                                            <button class="btn btn-sm btn-light"><i class="fas fa-eye"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>