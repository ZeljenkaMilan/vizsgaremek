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
        </a>
    </div>
    </header>

    <section id="billing">
        <h2>Your items</h2>
        <div id="receipt">
            <h3>Receipt</h3>
            <ul id="cart-items"></ul>
            <p id="total">Total: $0.00</p>
        </div>
    </section>

    
    <footer>
        <p>&copy; 2025 Webshop</p>
    </footer>

    <script src="java_script/script.js"></script>

</body>
</html>
