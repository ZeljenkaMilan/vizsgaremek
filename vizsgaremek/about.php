<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>About Us</title>
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
        <a href="about.php" class="active">About Us</a>
    </nav>
    <div class="cart-icon">
        <a href="billing.php">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</header>

<main>
    <section id="about">
        <h2>About Us</h2>
        <p>Welcome to our webshop! We are passionate about providing high-quality, trendy clothing that fits a wide range of styles and preferences.</p>
        
        <h3>Who Are We?</h3>
        <p>We are a dedicated team of fashion enthusiasts who aim to bring affordable and stylish clothing to everyone. Whether you're looking for casual outfits, workwear, or something for a special occasion, we've got you covered!</p>
        
        <h3>Who Is Our Target Audience?</h3>
        <p>Our target audience includes individuals of all ages who value fashion, quality, and affordability. We cater to both men and women, with a focus on providing diverse options for different tastes and lifestyles.</p>
        
        <h3>Where Can You Find Us?</h3>
        <p>You can visit our store in person at the following address:</p>
        <p><strong>Webshop Store</strong><br>
           123 Fashion Street,<br>
           Style City, SC 98765</p>
        <p>If you have any questions, feel free to contact us or stop by our store!</p>
    </section>
</main>

<footer>
    <p>&copy; 2025 Webshop</p>
</footer>

</body>
</html>
