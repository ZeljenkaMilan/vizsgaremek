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
    <button id="buy-button" onclick="showModal()">Buy Now</button>
</section>

<!-- Modal for payment and shipping options -->
<div id="payment-modal" class="modal">
    <div class="modal-content">
        <h3>Complete Your Purchase</h3>
        <form id="payment-form">
            <label for="payment-method">Payment Method:</label>
            <select id="payment-method">
                <option value="cash">Cash on Delivery</option>
                <option value="card">Credit Card</option>
            </select>

            <label for="shipping-method">Shipping Method:</label>
            <select id="shipping-method">
                <option value="home">Home Delivery</option>
                <option value="pickup">Store Pickup</option>
            </select>

            <button type="button" onclick="confirmPurchase()">Confirm Purchase</button>
            <button type="button" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>

<!-- Modal for thank you message -->
<div id="thank-you-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <h3>Thank You!</h3>
        <p id="thank-you-message"></p>
        <button onclick="closeThankYouModal()">Close</button>
    </div>
</div>

<footer>
    <p>&copy; 2025 Webshop</p>
</footer>

<script src="java_script/script.js"></script>

</body>
</html>
