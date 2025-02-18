<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <title>Webshop</title>
</head>
<body>

<?php require("php/connect.php"); ?>

<header>
    <div class="nav-container">
        <div class="logo">Webshop</div>
        <nav>
            <a href="index.php" class="current-page">Home</a>
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

<section class="slider-section">
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="kepek/th-1828587326.jpg" alt="Piros Póló">
            </div>
            <div class="swiper-slide">
                <img src="kepek/th-4073543462.jpg" alt="Kék Farmer">
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

    
<main>
    <section id="products">
        <h2>Trending Now</h2>
        <div class="product-grid">
            <?php
            // Termékek lekérdezése az adatbázisból
            $sql = "SELECT azon, nev, ar FROM termekek";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($products as $product): 
                // A termék első képének lekérdezése
                $sql = "SELECT kep_url FROM termek_kepek WHERE termek_azon = :id LIMIT 1";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $product['azon'], PDO::PARAM_INT);
                $stmt->execute();
                $kep = $stmt->fetchColumn() ?: 'no-image.jpg'; // Ha nincs kép, egy alapértelmezettet használ
            ?>
            <div class="product" onclick="redirectToProduct(<?= $product['azon']; ?>)">
                <img src="kepek/<?= htmlspecialchars($kep); ?>" alt="<?= htmlspecialchars($product['nev']); ?>">
                <h3><?= htmlspecialchars($product['nev']); ?></h3>
                <p><?= number_format($product['ar'], 0, ',', ' ') ?> Ft</p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Webshop | Elevate Your Game</p>
</footer>

<script src="java_script/script.js"></script>
</body>
</html>
