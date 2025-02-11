<?php
// connect.php betöltése
require("php/connect.php");

// Lekérjük a terméket az adatbázisból, az id alapján
$product_id = isset($_GET['id']) ? $_GET['id'] : 1; // Ha nincs megadva id, akkor 1-es terméket tölt be
$sql = "SELECT * FROM termekek WHERE azon = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Ha nincs ilyen termék, akkor 404-es hiba oldal
if (!$product) {
    echo "Termék nem található!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/style2.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?= htmlspecialchars($product['nev']); ?></title>
</head>
<body>
    <header>
        <div class="nav-container">
            <div class="logo">Webshop</div>
            <nav>
                <a href="index.php">Home</a>
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

    <!-- Product Section -->
    <section class="product-section">
        <div class="product-details">
            <!-- Termék Kép -->
            <div class="product-gallery">
                <img src="kepek/<?= htmlspecialchars($product['kep']); ?>" alt="<?= htmlspecialchars($product['nev']); ?>" class="main-image">
            </div>

            <!-- Termék információk -->
            <div class="product-info">
                <h1><?= htmlspecialchars($product['nev']); ?></h1>
                <p class="price"><?= number_format($product['ar'], 0, ',', ' ') ?> Ft</p>
                <p class="description"><?= htmlspecialchars($product['leiras']); ?></p>
                
                <!-- Változatok, méret és szín (ha van) -->
                <div class="product-options">
                    <label for="size">Size:</label>
                    <div class="size-selector">
                        <select id="size" name="size">
                            <option value="small">S</option>
                            <option value="medium">M</option>
                            <option value="large">L</option>
                        </select>
                    </div>
                    <button class="add-to-cart" onclick="addToCart('<?= htmlspecialchars($product['nev']); ?>', <?= $product['ar']; ?>)">Add to cart</button>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Webshop | Elevate Your Game</p>
    </footer>

    <script src="java_script/script.js"></script>
</body>
</html>
