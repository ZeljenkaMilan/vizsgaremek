<?php
session_start();
require("php/connect.php");

// Placeholder for login credentials (you should replace this with real database queries)
$valid_username = 'user123';
$valid_password = 'password123';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials (replace with database check in a real scenario)
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to a protected page
        exit;
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
</head>
<body class="reptile-bg">

<?php require("php/connect.php"); ?>

<header>
    <div class="nav-container">
        <div class="logo" onclick="window.location.href='index.php'">
            <img src="kepek/heet-logo-white.png" alt="Webshop Logo">
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="#products">Clothes</a>
            <a href="signup.php">Sign Up</a>
            <a href="about.php">About Us</a>
        </nav>
        <div class="nav-icons">
            <div class="cart-icon">
                <a href="billing.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span id="cart-count">0</span>
                </a>
            </div>
            <div class="user-icon">
                <a href="login.php">
                    <i class="fas fa-user"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="login-section">
        <div class="login-container">
            <h2>Login</h2>
            
            <?php if (isset($error_message)): ?>
                <p class="error-message"><?= $error_message ?></p>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login">
                </div>
            </form>
            
            <div class="redirect">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Heet Clothing | The style that never burns out!</p>
</footer>

<script src="java_script/script.js"></script>
</body>
</html>
