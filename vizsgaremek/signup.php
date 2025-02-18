<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Signup</title>
</head>
<body>

<?php
require("php/connect.php");
?>

<header>
<div class="nav-container">
<div class="logo">
    <img src="kepek/heet-logo-white.png" alt="Webshop Logo">
    </div>
        <nav>
            <a href="index.php" >Home</a>
            <a href="index.php#products">Clothes</a>
            <a href="signup.php" class="current-page">Sign Up</a>
            <a href="about.php">About Us</a>
        </nav>
        <div class="cart-icon">
            <a href="billing.php">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count">0</span>
            </a>
        </div>
    </div>
</header>

<h3 id="signup-text">Signup for our exclusive discounts and more!</h3>
    <div class="signup">
        <form action="signup.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <button>Signup</button>
        </form>
    </div>

<script src="java_script/script.js"></script>
<footer>
    <p>&copy; 2025 Heet Clothing | The style that never burns out!</p>
</footer>

</body>
</html>
