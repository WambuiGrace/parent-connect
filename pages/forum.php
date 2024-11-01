<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - Parents in Sync</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .navbar {
            background-color: #0fd0fb;
        }
        .category-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            height: 100%;
        }
        .thread-item {
            padding: 15px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .thread-item:last-child {
            border-bottom: none;
        }
        .category-link {
            color: #0066cc;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
        }
        .category-link:hover {
            text-decoration: underline;
        }
        .thread-title {
            color: #0066cc;
            text-decoration: none;
            font-weight: 500;
        }
        .thread-title:hover {
            text-decoration: underline;
        }
        .last-reply {
            color: #666;
            font-size: 0.9rem;
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
            </div>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <div class="container my-5 ">
        <!-- Forum Categories -->
        <h1 class="mb-4 text-center">Forum Categories</h1>
        <div class="row g-4 mb-5">
            <!-- Parenting Basics -->
            <div class="col-md-4 text-center">
                <div class="category-card">
                    <h2 class="h4 mb-3">Parenting Basics</h2>
                    <a href="#" class="category-link">Newborn Care</a>
                    <a href="#" class="category-link">Infant Development</a>
                    <a href="#" class="category-link">Toddler Development</a>
                    <a href="#" class="category-link">Child Development</a>
                </div>
            </div>

            <!-- Health and Safety -->
            <div class="col-md-4 text-center">
                <div class="category-card">
                    <h2 class="h4 mb-3">Health and Safety</h2>
                    <a href="#" class="category-link">Child Health</a>
                    <a href="#" class="category-link">First Aid</a>
                    <a href="#" class="category-link">Safety Tips</a>
                </div>
            </div>

            <!-- Community and Support -->
            <div class="col-md-4 text-center">
                <div class="category-card">
                    <h2 class="h4 mb-3">Community and Support</h2>
                    <a href="#" class="category-link">Parenting Stories</a>
                    <a href="#" class="category-link">Support Groups</a>
                    <a href="#" class="category-link">Local Resources</a>
                </div>
            </div>
        </div><br><br>

        <!-- Latest Threads -->
        <section>
            <h2 class="mb-4 text-center">Latest Threads</h2>
            <div class="thread-item">
                <a href="#" class="thread-title">Sleep training tips for 6-month-old</a>
                <div class="last-reply">Last replied by: ParentA</div>
            </div>
            <div class="thread-item">
                <a href="#" class="thread-title">Introducing solid foods - when and how?</a>
                <div class="last-reply">Last replied by: ParentB</div>
            </div>
            <div class="thread-item">
                <a href="#" class="thread-title">Dealing with toddler tantrums</a>
                <div class="last-reply">Last replied by: ParentC</div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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