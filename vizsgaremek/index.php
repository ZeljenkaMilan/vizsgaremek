<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Webshop</title>
</head>
<body>

<?php require("php/connect.php"); ?>

<header>
    <div class="nav-container">
        <div class="logo">Webshop</div>
        <nav>
            <a href="index.php" class="active">Home</a>
            <a href="#products">Clothes</a>
            <a href="signup.php">Sign Up</a>
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

<section class="hero" style="background-image: url('kepek/hero-bg.jpg');">
    <div class="hero-content">
        <h1>MOVE WITH STYLE</h1>
        <p>Innovative design. Unmatched comfort. Be unstoppable.</p>
        <a href="#products" class="shop-now-btn">Shop Now</a>
    </div>
</section>

<main>
    <section id="products">
        <h2>Trending Now</h2>
        <div class="product-grid">
            <div class="product">
                <img src="kepek/th-1828587326.jpg" alt="Product 1">
                <h3><?php echo htmlspecialchars($name1); ?></h3>
                <p>$10.00</p>
                <button class="buy-btn" onclick="addToCart('<?php echo htmlspecialchars($name1); ?>', 10)">Add to cart</button>
                <button class="buy-btn" onclick="addToCart('<?php echo htmlspecialchars($name1); ?>', 10); window.location.href='billing.php'">Buy now</button>

            </div>
            <div class="product">
                <img src="kepek/th-4073543462.jpg" alt="Product 2">
                <h3><?php echo htmlspecialchars($name2); ?></h3>
                <p>$15.00</p>
                <button class="buy-btn" onclick="addToCart('<?php echo htmlspecialchars($name2); ?>', 15)">Add to cart</button>
                <button class="buy-btn" onclick="addToCart('<?php echo htmlspecialchars($name2); ?>', 15); window.location.href='billing.php'">Buy now</button>

            </div>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Webshop | Elevate Your Game</p>
</footer>

<script src="java_script/script.js"></script>
</body>
</html>
