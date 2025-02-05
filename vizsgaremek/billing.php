<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Billing</title>
</head>
<body>
    
<header>
        <h1>Webshop</h1>
        <nav>
            <a href="index.php">Home</a>
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
    </header>

    <section id="billing">
        <h2>Your receipt</h2>
        <div id="receipt">
            <ul id="cart-items"></ul>
            <p id="total">Total: $0.00</p>

            
        <!-- Delivery Options Form -->
        <div id="delivery-options">
            <h4>Choose Delivery Option</h4>
            <label for="delivery">Delivery Type:</label>
            <select id="delivery" name="delivery">
                <option value="home">Home Delivery</option>
                <option value="pickup">In-Store Pickup</option>
            </select>
        </div>

        <!-- Place Order Button -->
        <button id="place-order-btn">Place Order</button>
        </div>
    </section>

    
    <footer>
        <p>&copy; 2025 Webshop</p>
    </footer>

    <script src="java_script/script2.js"></script>
    <script src="java_script/script.js"></script>

</body>
</html>
