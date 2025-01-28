<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Webshop</title>
</head>
<body>

<?php
require("php/connect.php");
?>

<header>
    <h1>Webshop</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="#products">Clothes</a>
        <a href="signup.php">Sign Up</a>
        <a href="about.php">About Us</a> <!-- New About Us tab -->
    </nav>
    <div class="cart-icon">
        <a href="billing.php">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</header>

<main>
    <section id="products">
        <h2>Our Products</h2>
        <div class="product-grid">

            <div class="product">
                <img src="kepek/th-1828587326.jpg" alt="Product 1">
                <h3 id="name1"><?php echo htmlspecialchars($name1); ?></h3>
                <p>$10.00</p>
                <button class="buy-btn" onclick="addToCart('<?php echo htmlspecialchars($name1); ?>', 10)">Buy Now</button>
            </div>

            <div class="product">
                <img src="kepek/th-4073543462.jpg" alt="Product 2">
                <h3 id="name2"><?php echo htmlspecialchars($name2); ?></h3>
                <p>$15.00</p>
                <button class="buy-btn" onclick="addToCart('<?php echo htmlspecialchars($name2); ?>', 15)">Buy Now</button>
            </div>

        </div>
    </section>

    <section id="billing">
        <h2>Your items</h2>
        <div id="receipt">
            <h3>Receipt</h3>
            <ul id="cart-items"></ul>
            <p id="total">Total: $0.00</p>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Webshop</p>
</footer>

<script src="java_script/script.js"></script>
</body>
</html>
