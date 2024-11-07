<?php
session_start();
require_once '../includes/connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Fetch statistics
$stats = [
    'articles' => 0,
    'views' => 0,
    'comments' => 0,
    'users' => 0
];

$sql_articles = "SELECT COUNT(*) as count FROM articles WHERE status = 'published'";
$sql_views = "SELECT SUM(views) as count FROM articles";
$sql_comments = "SELECT COUNT(*) as count FROM comments";
$sql_users = "SELECT COUNT(*) as count FROM users";

$result_articles = $conn->query($sql_articles);
$result_views = $conn->query($sql_views);
$result_comments = $conn->query($sql_comments);
$result_users = $conn->query($sql_users);

if ($result_articles && $result_views && $result_comments && $result_users) {
    $stats['articles'] = $result_articles->fetch_assoc()['count'];
    $stats['views'] = $result_views->fetch_assoc()['count'];
    $stats['comments'] = $result_comments->fetch_assoc()['count'];
    $stats['users'] = $result_users->fetch_assoc()['count'];
}

// Fetch recent articles
$sql_recent_articles = "SELECT id, title, views, date_posted, status FROM articles ORDER BY date_posted DESC LIMIT 5";
$result_recent_articles = $conn->query($sql_recent_articles);
$recent_articles = [];
if ($result_recent_articles) {
    while ($row = $result_recent_articles->fetch_assoc()) {
        $recent_articles[] = $row;
    }
}

// Fetch user information
$user_id = $_SESSION['user_id'];
$sql_user = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($sql_user);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result_user = $stmt->get_result();
$user = $result_user->fetch_assoc();

?>
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

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Dashboard</h2>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-2"></i>
                        <?php echo htmlspecialchars($user['username']); ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="../auth/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>

            <!-- Stats -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="stat-card d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted">Published articles</div>
                            <h3 class="mb-1"><?php echo $stats['articles']; ?></h3>
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
                            <h3 class="mb-1"><?php echo $stats['views']; ?></h3>
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
                            <h3 class="mb-1"><?php echo $stats['comments']; ?></h3>
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
                            <h3 class="mb-1"><?php echo $stats['users']; ?></h3>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Articles -->
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
                            <?php foreach ($recent_articles as $index => $article): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars($article['title']); ?></td>
                                <td><?php echo $article['views']; ?></td>
                                <td><?php echo date('d M Y', strtotime($article['date_posted'])); ?></td>
                                <td>
                                    <button type="button" class="btn <?php echo $article['status'] == 'published' ? 'btn-primary' : 'btn-warning'; ?>"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        <strong><?php echo ucfirst($article['status']); ?></strong>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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