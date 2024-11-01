<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
        }
        .sidebar {
            background: #f8f9fa;
            min-height: 100vh;
            width: 250px;
        }
        .logo {
            color: #000;
            font-weight: bold;
        }
        .stat-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #f8f9fa;
            color: #002fa6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .nav-link {
            color: #666;
            padding: 0.8rem 1rem;
        }
        .nav-link:hover {
            background-color: #f8f9fa;
        }
        .nav-link.active {
            background-color: #e8f8f3;
            color: #04265e;
        }
        .nav-links .nav-link {
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <div class="logo fs-4 mb-4 text-center">
                <h2>Parents in Sync</h2>
            </div>
            <div class="nav flex-column nav-links nav-link mb-2">
                <a href="dashboard.php" class="nav-link mb-2">
                    <i class="fas fa-home me-2"></i>
                    Dashboard
                </a>
                <a href="manage_articles.php" class="nav-link mb-2">
                    <i class="fas fa-newspaper me-2"></i>
                    Articles
                </a>
                <a href="manage_users.php" class="nav-link mb-2">
                    <i class="fas fa-users me-2"></i>
                    Profiles
                </a>
                <a href="report.php" class="nav-link active mb-2">
                    <i class="fas fa-file-alt me-2"></i>
                    Report
                </a>
                <a href="../auth/logout.php" class="nav-link text-danger">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Reports</h2>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-2"></i>
                        John Doe
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>

        <!-- reports -->
            <!-- Reports Card -->
            <div class="report-card">
                <h5 class="mb-4">Generate Reports</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" onclick="generatePdfReport()">
                            <i class="bi bi-file-pdf me-2"></i> Generate PDF Report
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" onclick="generateExcelReport()">
                            <i class="bi bi-file-excel me-2"></i> Generate Excel Report
                        </button>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-outline-primary w-100" onclick="previewReport()">
                            <i class="bi bi-eye me-2"></i> Preview Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
         
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<!-- Footer -->
<footer class="footer mt-auto py-3 bg-light footer">
    <div class="container">
        <div class="text-center">
            <p class="text-muted mb-0">&copy; 2024 Parents in Sync. All rights reserved.</p>
        </div>
    </div>
</footer>
</html>