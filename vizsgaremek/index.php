<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- kulon karakter importalas a kosar ikonnak -->
    <title>Webshop</title>
</head>
<body>

<?php
// Database configuration
$dsn = "mysql:host=localhost;dbname=webshop;charset=utf8mb4"; // Data Source Name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password

try { 
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);
    
    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Connected successfully"; 
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
}


try {

    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Specify the IDs (azon values) you want to fetch
    $id1 = 1; // Replace with the first azon value you want to fetch
    $id2 = 2; // Replace with the second azon value you want to fetch

    // SQL query to fetch specific rows based on azon
    $sql = "SELECT nev FROM termekek WHERE azon IN (:id1, :id2)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id1', $id1, PDO::PARAM_INT);
    $stmt->bindParam(':id2', $id2, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch results as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Extract names or set fallback values
    $name1 = isset($results[0]['nev']) ? $results[0]['nev'] : "No data found for ID $id1";
    $name2 = isset($results[1]['nev']) ? $results[1]['nev'] : "No data found for ID $id2";
} catch (PDOException $e) {
    $name1 = $name2 = "Error: " . $e->getMessage(); // Display error in both H1s
}
?>

<header>
        <h1>Webshop</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="#clothes">Clothes</a>
            <a href="signup.php">Sign Up</a>
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
                    <button class="buy-btn" onclick="addToCart('Product 1', 10)">Buy Now</button>
                </div>

                <div class="product">
                    <img src="kepek/th-4073543462.jpg" alt="Product 2">
                    <h3 id="name2"><?php echo htmlspecialchars($name2); ?></h3>
                    <p>$15.00</p>
                    <button class="buy-btn" onclick="addToCart('Product 2', 15)">Buy Now</button>
                </div>

            </div>
        </section>

        <section id="billing">
            <h2>Billing Page</h2>
            <div id="receipt">
                <h3>Your Receipt</h3>
                <ul id="cart-items"></ul>
                <p id="total"></p>
            </div>
        </section>


    </main>

    <footer>
        <p>&copy; 2024 Webshop</p>
    </footer>

    <script src="java_script/script.js"></script>
</body>
</html>