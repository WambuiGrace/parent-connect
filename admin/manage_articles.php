<?php
session_start();
require_once '../includes/connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch articles from the database
$sql = "SELECT a.id, a.title, u.username AS author, a.category, a.status 
        FROM articles a 
        JOIN users u ON a.author_id = u.id 
        ORDER BY a.date_posted DESC";
$result = $conn->query($sql);
$articles = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }
}

// Handle publish/unpublish action
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action = $_GET['action'];
    
    if ($action === 'publish') {
        $sql = "UPDATE articles SET status = 'published' WHERE id = ?";
    } elseif ($action === 'unpublish') {
        $sql = "UPDATE articles SET status = 'not_published' WHERE id = ?";
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    header("Location: manage_articles.php");
    exit();
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
    <title>Manage Articles - Admin Dashboard</title>
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
            color: #00a67d;
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
                <a href="manage_articles.php" class="nav-link active mb-2">
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
                <h2>Articles</h2>
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
            
            <!-- Articles Table -->
            <div class="bg-white rounded p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>Manage Articles</h4>
                    <a href="add_article.php" class="btn btn-primary">Add New Article</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles as $index => $article): ?>
                            <tr>
                                <th scope="row"><?php echo $index + 1; ?></th>
                                <td><?php echo htmlspecialchars($article['title']); ?></td>
                                <td><?php echo htmlspecialchars($article['author']); ?></td>
                                <td><?php echo htmlspecialchars($article['category']); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo $article['status'] == 'published' ? 'success' : 'warning'; ?>">
                                        <?php echo ucfirst($article['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="edit_article.php?id=<?php echo $article['id']; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <a href="delete_article.php?id=<?php echo $article['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
                                    <?php if ($article['status'] == 'published'): ?>
                                        <a href="?action=unpublish&id=<?php echo $article['id']; ?>" class="btn btn-sm btn-outline-warning">Unpublish</a>
                                    <?php else: ?>
                                        <a href="?action=publish&id=<?php echo $article['id']; ?>" class="btn btn-sm btn-outline-success">Publish</a>
                                    <?php endif; ?>
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
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <div class="text-center">
            <p class="text-muted mb-0">&copy; 2024 Parents in Sync. All rights reserved.</p>
        </div>
    </div>
</footer>
</html>