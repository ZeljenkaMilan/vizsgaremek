let cart = [];

// Add product to cart (with quantity handling)
function addToCart(productName, price, imageUrl) {
    let existingProduct = cart.find(item => item.name === productName);

    if (existingProduct) {
        existingProduct.quantity += 1; // Ha már létezik, növeli a mennyiséget
    } else {
        cart.push({ name: productName, price: price, imageUrl: imageUrl, quantity: 1 });
    }

    saveCartToLocalStorage();
    updateReceipt();
    updateCartCount();
}

// Increase quantity of a product
function increaseQuantity(productName) {
    let product = cart.find(item => item.name === productName);

    if (product) {
        product.quantity += 1;
    }

    saveCartToLocalStorage();
    updateReceipt();
    updateCartCount();
}

// Remove product from cart (reduce quantity or remove if 1)
function removeFromCart(productName) {
    let productIndex = cart.findIndex(item => item.name === productName);

    if (productIndex !== -1) {
        if (cart[productIndex].quantity > 1) {
            cart[productIndex].quantity -= 1;
        } else {
            cart.splice(productIndex, 1); // Ha már csak 1 db van, akkor teljesen eltávolítjuk
        }
    }

    saveCartToLocalStorage();
    updateReceipt();
    updateCartCount();
}

// Update receipt on the billing page (with plus/minus buttons)
function updateReceipt() {
    const cartItems = document.getElementById('cart-items');
    const totalDisplay = document.getElementById('total');

    if (!cartItems || !totalDisplay) return;

    cartItems.innerHTML = ''; // Clear current items
    let total = 0;

    cart.forEach(item => {
        const li = document.createElement('li');
        li.innerHTML = `
            <img src="${item.imageUrl}" alt="${item.name}" class="cart-item-image">
            ${item.name} - $${item.price.toFixed(2)} x ${item.quantity}
            <button class="quantity-btn" onclick="removeFromCart('${item.name}')">−</button>
            <button class="quantity-btn" onclick="increaseQuantity('${item.name}')">+</button>
        `;
        cartItems.appendChild(li);
        total += item.price * item.quantity;
    });

    totalDisplay.textContent = `Total: $${total.toFixed(2)}`;
}

// Update cart count on the index page
function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    if (!cartCount) return;

    let itemCount = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = itemCount;
}

// Save cart to localStorage
function saveCartToLocalStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Load cart from localStorage
function loadCartFromLocalStorage() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
        updateReceipt();
        updateCartCount();
    }
}

// Load the cart when the page loads
document.addEventListener('DOMContentLoaded', function () {
    loadCartFromLocalStorage();
    updateCartCount();
    updateReceipt();
});


// Redirect to product page on click
function redirectToProduct(productId) {
    window.location.href = 'product.php?id=' + productId;
}


document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".swiper", {
        loop: true,
        autoplay: {
            delay: 3000, // 3 másodpercenként vált
            disableOnInteraction: false
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        }
    });
});

//Product page swiper
let currentIndex = 0;
const slides = document.querySelectorAll(".slide");

function showImage(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove("active");
        if (i === index) {
            slide.classList.add("active");
        }
    });
}

function prevImage() {
    currentIndex = (currentIndex === 0) ? slides.length - 1 : currentIndex - 1;
    showImage(currentIndex);
}

function nextImage() {
    currentIndex = (currentIndex === slides.length - 1) ? 0 : currentIndex + 1;
    showImage(currentIndex);
}






//Order Summarizing Process

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
