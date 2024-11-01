<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Parents in Sync</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .navbar {
            background-color: #0fd0fb;
        }
        .testimonial-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .footer {
            background-color: #1a1a1a;
            color: white;
            padding: 1rem 0;
            position: relative;
            bottom: 0;
            width: 100%;
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
    <div class="container my-5">
        <!-- About Us Section -->
        <section class="mb-5">
            <h1 class="text-center mb-4">About Us</h1>
            <p class="text-center">
                Our parenting forum is a supportive and informative community dedicated to helping 
                parents navigate the challenges and joys of raising children. We believe in creating a safe 
                and welcoming space where parents can connect, share experiences, and find the support 
                they need. Our mission is to provide valuable resources, expert advice, and a sense of 
                belonging to parents from all walks of life.
            </p>
        </section>

        <!-- Our Values Section -->
        <section class="mb-5">
            <h2 class="mb-4 text-center">Our Values</h2>
            <ul class="list-unstyled text-center">
                <li class="mb-2">• Empathy</li>
                <li class="mb-2">• Respect</li>
                <li class="mb-2">• Inclusivity</li>
                <li class="mb-2">• Community</li>
            </ul>
        </section>

        <!-- Testimonials Section -->
        <section class="mb-5">
            <h2 class="mb-4 text-center">Testimonials</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="testimonial-card text-center">
                        <h5>Amanda Grace, Nairobi, Kenya</h5>
                        <p>I was feeling overwhelmed and isolated as a new mom until I discovered this forum. 
                        The community here has been incredibly supportive and helpful. I've found valuable 
                        advice, shared experiences, and made lifelong connections with other parents. I'm 
                        so grateful for the support and encouragement I've received.</p>
                        <small class="text-muted">Posted on: January 15, 2024</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimonial-card text-center">
                        <h5>Oliver Makau, Nairobi, Kenya</h5>
                        <p>I love the friendly and welcoming atmosphere of this forum. It's a great place to 
                        connect with other parents.</p>
                        <small class="text-muted">Posted on: January 15, 2024</small>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section class="mb-5 text-center">
            <h2 class="mb-4">Contact Us</h2>
            <div class="mb-3">
                <strong>Email: </strong>
                <a href="mailto:contact@parentsinsync.com">contact@parentsinsync.com</a>
            </div>
            <div class="mb-3">
                <strong>Phone: </strong>
                <a href="tel:+254712345678">+254 712 345 678</a>
            </div>
            <div class="mb-3">
                <strong>Address: </strong>
                Parents in Sync, Nairobi, Kenya
            </div>
            <div class="mb-3">
                <strong>Social Media: </strong>
                <a href="#" class="text-decoration-none me-2">Facebook</a>
                <a href="#" class="text-decoration-none me-2">Twitter</a>
                <a href="#" class="text-decoration-none">Instagram</a>
            </div>
        </section>
    </div>
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