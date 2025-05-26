<?php
// Include database connection to save messages to DB
// include 'db_connect.php'; 

$form_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message_content = htmlspecialchars(trim($_POST['message']));

    // Basic validation
    if (empty($name) || empty($email) || empty($subject) || empty($message_content)) {
        $form_message = '<div class="alert alert-danger" role="alert">All fields are required.</div>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_message = '<div class="alert alert-danger" role="alert">Invalid email format.</div>';
    } else {
        // In a real application, would send an email here:
        // $to = "your_email@example.com";
        // $headers = "From: $name <$email>";
        // mail($to, $subject, $message_content, $headers);

        // Or save to a database:
        /*
        $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message_content) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message_content);
        if ($stmt->execute()) {
            $form_message = '<div class="alert alert-success" role="alert">Thank you for your message! We will get back to you soon.</div>';
            // Clear form fields after successful submission
            $_POST = array(); // A simple way to clear for display
        } else {
            $form_message = '<div class="alert alert-danger" role="alert">Error sending message. Please try again later.</div>';
        }
        $stmt->close();
        */

        // For demonstration
        $form_message = '<div class="alert alert-success" role="alert">Thank you for your message! We will get back to you soon.</div>';
        $_POST = array(); // Clear for display
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact TSUBAKI FLORAL for inquiries, custom orders, or support. Get in touch with our floral design experts.">
    <meta name="keywords" content="contact, TSUBAKI FLORAL, flower shop contact, customer service, floral inquiries">
    <title>Contact Us - TSUBAKI FLORAL</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm" id="mainNav">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="index.php">
                <i class="bi bi-flower1 text-primary me-2"></i>
                TSUBAKI FLORAL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#searchCollapse" aria-expanded="false" aria-controls="searchCollapse">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>

                    <button class="btn btn-outline-primary position-relative me-2" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                        <i class="bi bi-bag"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cartCount">0</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="collapse" id="searchCollapse">
            <div class="container py-3 border-top">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search flowers, arrangements..."
                                   aria-label="Search" id="searchInput">
                            <button class="btn btn-primary" type="button" id="searchBtn">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <div id="searchSuggestions" class="mt-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-5 bg-light text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Contact Us</h1>
            <p class="lead text-muted">We'd love to hear from you! Reach out for any inquiries, custom orders, or feedback.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 p-4">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-center mb-4">Send Us a Message</h4>
                            <div id="formMessage">
                                <?php echo $form_message; // Display PHP messages ?>
                            </div>
                            <form id="contactForm" method="POST" action="contact.php">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Your Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 text-center">
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="card-body">
                            <i class="bi bi-geo-alt-fill display-5 text-primary mb-3"></i>
                            <h5 class="fw-bold mb-2">Our Location</h5>
                            <p class="text-muted">123 Blossom Lane, Floral City, FC 45678</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="card-body">
                            <i class="bi bi-envelope-fill display-5 text-primary mb-3"></i>
                            <h5 class="fw-bold mb-2">Email Us</h5>
                            <p class="text-muted">info@tsubakifloral.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="card-body">
                            <i class="bi bi-phone-fill display-5 text-primary mb-3"></i>
                            <h5 class="fw-bold mb-2">Call Us</h5>
                            <p class="text-muted">+1 (555) 123-4567</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-3">Stay in Bloom</h3>
                    <p class="mb-0">Subscribe to receive exclusive offers, seasonal arrangements, and floral care tips.</p>
                </div>
                <div class="col-lg-6">
                    <form class="row g-2" id="newsletterForm">
                        <div class="col-sm-8">
                            <input type="email" class="form-control form-control-lg"
                                   placeholder="Enter your email address" required>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-light btn-lg w-100" >
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-flower1 me-2"></i>
                        TSUBAKI FLORAL
                    </h5>
                    <p class="mb-3">
                        Creating beautiful moments with elegant floral arrangements.
                        Premium flowers delivered fresh to your door.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-light"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-pinterest fs-5"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">
                        &copy; 2024 TSUBAKI FLORAL. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <button type="button" class="btn btn-primary btn-floating position-fixed bottom-0 end-0 m-4 d-none"
            id="backToTopBtn" style="z-index: 1000;">
        <i class="bi bi-arrow-up"></i>
    </button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/script.js"></script>
    
    <script>
        // Client-side handling of contact form is removed if using PHP for submission
        // Might keep some for client-side validation/UX
        document.addEventListener('DOMContentLoaded', function() {
            // No longer preventing default submission if PHP handles it
            // Remove the previous event listener if you added it
            // const contactForm = document.getElementById('contactForm');
            // if (contactForm) {
            //     contactForm.addEventListener('submit', function(event) {
            //         // event.preventDefault(); // Removed for PHP submission
            //         // Your client-side validation logic here (if any)
            //     });
            // }
        });
    </script>
</body>
</html>