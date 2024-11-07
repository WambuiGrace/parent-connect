<?php
session_start();
require_once 'connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'user') {
    header("Location: login.php");
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

// Fetch latest threads
$sql_threads = "SELECT id, title, excerpt FROM threads ORDER BY created_at DESC LIMIT 3";
$result_threads = $conn->query($sql_threads);
$latest_threads = [];
if ($result_threads) {
    while ($row = $result_threads->fetch_assoc()) {
        $latest_threads[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Parents in Sync - Dashboard</title>

    <style>
        .custom-navbar {
            background-color: #0fd0fb;
        }

        .footer {
            background-color: #0fd0fb;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">Parents in Sync</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="about.php">About Us</a>
                    <a class="nav-link" href="forum.php">Forum</a>
                    <a class="nav-link" href="resources.php">Resources</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    
    <section class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="card-title text-center">Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
                <h4 class="card-text text-center">
                    Parents in Sync is a supportive community where new parents can connect, share their experiences, and access valuable resources. 
                    Whether you're seeking advice, looking to share your journey, or finding reliable information, this is the place to be. 
                    Our forum is open to both moms and dads, providing a space where every voice matters.
                </h4>
                <div class="text-center mt-4">
                    <a href="forum.php" class="btn btn-primary btn-lg">Join the Discussion</a>
                </div>              
            </div>
        </div>
    </section>
    
    <section class="container mt-5">
        <div class="container py-5">
            <h1 class="text-center mb-4">Featured Latest Threads</h1> 
            
            <div class="row g-4">
                <?php foreach ($latest_threads as $thread): ?>
                <div class="col-12 col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="images/placeholder.jpg" class="card-img-top" alt="Placeholder image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($thread['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($thread['excerpt']); ?></p>
                            <a href="thread.php?id=<?php echo $thread['id']; ?>" class="text-decoration-none text-primary">Read more</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
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