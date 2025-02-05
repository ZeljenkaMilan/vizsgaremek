<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Payment</title>
</head>
<body>

<?php
require("php/connect.php");
?>

<header>
    <h1>Webshop</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="billing.php">Back to Cart</a>
    </nav>
</header>

<section id="payment">
    <h2>Payment Details</h2>
    <div id="order-summary">
        <h3>Order Summary</h3>
        <ul id="order-items"></ul>
        <p id="order-total">Total: $0.00</p>
        <p id="delivery-method"></p>
    </div>

    <!-- Szállítási adatok (Csak Home Delivery esetén jelenik meg) -->
    <div id="delivery-form" style="display: none;">
        <h3>Shipping Information</h3>
        <form id="shipping-form">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <label for="zip">ZIP Code:</label>
            <input type="text" id="zip" name="zip" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
        </form>
    </div>

    <button id="pay-now-btn">Proceed to Payment</button>
</section>

<footer>
    <p>&copy; 2025 Webshop</p>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const orderDetails = JSON.parse(localStorage.getItem("orderDetails"));

        if (!orderDetails || orderDetails.cartItems.length === 0) {
            document.getElementById("order-summary").innerHTML = "<p>No order found.</p>";
            return;
        }

        // Megjeleníti a rendelési tételeket
        const orderItems = document.getElementById("order-items");
        orderDetails.cartItems.forEach(item => {
            const li = document.createElement("li");
            li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
            orderItems.appendChild(li);
        });

        document.getElementById("order-total").textContent = `Total: $${orderDetails.total}`;
        const deliveryMethod = orderDetails.delivery === "home" ? "Home Delivery" : "In-Store Pickup";
        document.getElementById("delivery-method").textContent = `Delivery Method: ${deliveryMethod}`;

        // Ha Home Delivery-t választott, jelenjen meg a szállítási mező
        if (orderDetails.delivery === "home") {
            document.getElementById("delivery-form").style.display = "block";
        }

        document.getElementById("pay-now-btn").addEventListener("click", function() {
            if (orderDetails.delivery === "home") {
                // Ellenőrizzük, hogy minden mező ki van-e töltve
                const name = document.getElementById("name").value.trim();
                const address = document.getElementById("address").value.trim();
                const city = document.getElementById("city").value.trim();
                const zip = document.getElementById("zip").value.trim();
                const phone = document.getElementById("phone").value.trim();

                if (!name || !address || !city || !zip || !phone) {
                    alert("Please fill in all shipping details before proceeding!");
                    return;
                }
            }

            alert("Redirecting to payment gateway...");
            window.location.href = "payment_gateway.php"; // Itt mehet egy igazi fizetési oldalra
        });
    });
</script>

</body>
</html>
