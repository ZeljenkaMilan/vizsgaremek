<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
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

<!-- CSÚSZKA SZEKCIÓ -->
<section class="slider-section">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="kepek/th-1828587326.jpg" alt="Product 1"></div>
            <div class="swiper-slide"><img src="kepek/th-4073543462.jpg" alt="Product 2"></div>
            
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
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
            </div>
            
            <div class="product">
                <img src="kepek/th-4073543462.jpg" alt="Product 2">
                <h3><?php echo htmlspecialchars($name2); ?></h3>
                <p>$15.00</p>
                <button class="buy-btn" onclick="addToCart('<?php echo htmlspecialchars($name2); ?>', 15)">Add to cart</button>
            </div>
        </div>
    </section>
</main>

<footer>
    
    
    <p>&copy; 2025 Webshop | Elevate Your Game</p>
    <!-- Payment Methods Section -->
    <div class="payment-icons">
        <i class="fab fa-cc-mastercard"></i>
        <i class="fab fa-cc-visa"></i>
        <i class="fab fa-apple-pay"></i>
        <i class="fab fa-paypal"></i>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 1,
            spaceBetween: 10,
        });

        // Ellenőrizd, hogy a swiper objektum létezik-e
        if (swiper) {
            console.log("Swiper initialized!");
        } else {
            console.error("Swiper initialization failed!");
        }
    }, 100); // Kis késleltetés, hogy biztosan betöltődjön
});
</script>

<script src="java_script/script.js"></script>

</body>
</html>
