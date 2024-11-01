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
                <a href="manage_users.php" class="nav-link active mb-2">
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
                <a href="report.php" class="nav-link mb-2">
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
                <h2>Dashboard</h2>
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

            <!-- Stats -->
             <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="stat-card d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted">Published articles</div>
                            <h3 class="mb-1">720</h3>
                            
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted">Views</div>
                            <h3 class="mb-1">4920</h3>
                            
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted">Comments</div>
                            <h3 class="mb-1">3899</h3>
                            
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted">Users</div>
                            <h3 class="mb-1">250</h3>
                            
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded p-4">
                <h4 class="mb-4">Recent Articles</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Views</th>
                                <th>Date Posted</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Overcoming Sleep Regressions: Tips for Parents</td>
                                <td>100</td>
                                <td>15 Jan 2024</td>
                                <td>Published</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Overcoming Sleep Regressions: Tips for Parents</td>
                                <td>1000</td>
                                <td>15 Jan 2024</td>
                                <td>Published</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Overcoming Sleep Regressions: Tips for Parents</td>
                                <td>10</td>
                                <td>15 Jan 2024</td>
                                <td>Published</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Overcoming Sleep Regressions: Tips for Parents</td>
                                <td>1</td>
                                <td>15 Jan 2024</td>
                                <td>Not published</td>
                            </tr>
                            
                        </tbody>
                    </table>
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