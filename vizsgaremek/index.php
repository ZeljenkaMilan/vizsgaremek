<?php
require("php/connect.php"); // Adatbázis kapcsolat

// Termékek lekérése az adatbázisból
try {
    $sql = "SELECT azon, nev, ar, kep FROM termekek";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Hiba: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">
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
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <!-- Kép elérési útja helyesbítve -->
                    <a href="product.php?id=<?= $product['azon']; ?>">
                        <img src="kepek/<?= htmlspecialchars($product['kep']); ?>" alt="<?= htmlspecialchars($product['nev']); ?>">
                    </a>
                    <h3><?= htmlspecialchars($product['nev']); ?></h3>
                    <p><?= number_format($product['ar'], 0, ',', ' ') ?> $</p>
                    <button class="buy-btn" onclick="addToCart('<?= htmlspecialchars($product['nev']); ?>', <?= $product['ar']; ?>)">Add to cart</button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Webshop | Elevate Your Game</p>
    <div class="payment-icons">
        <i class="fab fa-cc-mastercard"></i>
        <i class="fab fa-cc-visa"></i>
        <i class="fab fa-apple-pay"></i>
        <i class="fab fa-paypal"></i>
    </div>
</footer>

<script src="java_script/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: { delay: 3000, disableOnInteraction: false },
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            slidesPerView: 1,
            spaceBetween: 10,
        });
    });
</script>

</body>
</html>
