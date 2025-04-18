<?php
// Initialize variables to store form data and error messages
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$successMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty(trim($_POST["name"]))) {
        $nameErr = "Name is required.";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    // Validate Email
    if (empty(trim($_POST["email"]))) {
        $emailErr = "Email is required.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    // Validate Message
    if (empty(trim($_POST["message"]))) {
        $messageErr = "Message is required.";
    } else {
        $message = htmlspecialchars(trim($_POST["message"]));
    }

    // If there are no errors, send the email
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $to = "your-email@example.com"; // Replace with your email address
        $subject = "New Contact Form Submission from $name";
        $body = "Name: $name\nEmail: $email\nMessage: $message\n";
        $headers = "From: $email";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            $successMessage = "Message sent successfully!";
        } else {
            $successMessage = "Message could not be sent.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 class="heading">Contact Details</h1>
            <hr/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="index.html">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="projects.html">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    
    <section id="contact" class="section mt-5">
        <div class="container">
            <h2 class="text-center">Contact Information</h2>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Phone No:</strong> 6969696969</p>
                    <p><strong>Email:</strong> <a href="mailto:suhruthghanta12@gmail.com">suhruthghanta12@gmail.com</a></p>
                    <p><strong>LinkedIn:</strong> <a href="#" target="_blank">Ghanta Suhruth</a></p>
                    <p><strong>GitHub:</strong> <a href="https://github.com/suhruthghanta" target="_blank">suhruthghanta</a></p>
                </div>
                <div class="col-md-6">
                    <h4>Send me a message</h4>
                    <?php if (!empty($successMessage)): ?>
                        <div class="alert alert-success"><?php echo $successMessage; ?></div>
                    <?php endif; ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>" required>
                            <small class="text-danger"><?php echo $nameErr; ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>" required>
                            <small class="text-danger"><?php echo $emailErr; ?></small>
                        </div>
                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" required><?php echo $message; ?></textarea>
                            <small class="text-danger"><?php echo $messageErr; ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-primary text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Ghanta Suhruth. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
