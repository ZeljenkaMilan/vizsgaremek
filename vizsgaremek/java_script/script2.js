document.addEventListener("DOMContentLoaded", function () {
    const placeOrderBtn = document.getElementById("place-order-btn");
    const orderSummary = document.getElementById("order-summary");
    const payNowBtn = document.getElementById("pay-now-btn");

    // Ha a place order gomb létezik, akkor billing.php oldalon vagyunk
    if (placeOrderBtn) {
        placeOrderBtn.addEventListener("click", function () {
            // Kosár elemek összegyűjtése
            const cartItems = [];
            document.querySelectorAll("#cart-items li").forEach(item => {
                const parts = item.textContent.split(" - $");
                if (parts.length === 2) {
                    cartItems.push({ name: parts[0], price: parseFloat(parts[1]) });
                }
            });

            if (cartItems.length === 0) {
                alert("Your cart is empty!");
                return;
            }

            // Számoljuk az összesített árat
            const total = cartItems.reduce((sum, item) => sum + item.price, 0).toFixed(2);

            // Szállítási mód mentése
            const deliveryMethod = document.getElementById("delivery").value;

            // Adatok mentése a localStorage-be
            const orderDetails = {
                cartItems: cartItems,
                total: total,
                delivery: deliveryMethod
            };
            localStorage.setItem("orderDetails", JSON.stringify(orderDetails));

            // Átirányítás a fizetési oldalra
            window.location.href = "pay.php";
        });
    }

    // Ha az orderSummary létezik, akkor a pay.php oldalon vagyunk
    if (orderSummary) {
        const orderDetails = JSON.parse(localStorage.getItem("orderDetails"));

        if (!orderDetails || orderDetails.cartItems.length === 0) {
            orderSummary.innerHTML = "<p>No order found.</p>";
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

        // Ha Home Delivery-t választott, mutassa meg a szállítási mezőket
        if (orderDetails.delivery === "home") {
            document.getElementById("delivery-form").style.display = "block";
        }

        if (payNowBtn) {
            payNowBtn.addEventListener("click", function () {
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
        }
    }
});
