let cart = [];

// Add product to cart
function addToCart(productName, price) {
    cart.push({ name: productName, price: price });
    saveCartToLocalStorage();
    updateReceipt();
    updateCartCount(); // Update cart count after adding a product
}

// Remove product from cart
function removeFromCart(index) {
    cart.splice(index, 1); // Remove the item at the specified index
    saveCartToLocalStorage();
    updateReceipt();
    updateCartCount(); // Update cart count after removing a product
}

// Update receipt on the billing page
function updateReceipt() {
    const cartItems = document.getElementById('cart-items');
    const totalDisplay = document.getElementById('total');
    
    // If these elements don't exist, just return
    if (!cartItems || !totalDisplay) return;

    cartItems.innerHTML = ''; // Clear current items
    let total = 0;

    cart.forEach((item, index) => {
        const li = document.createElement('li');
        li.innerHTML = `
            ${item.name} - $${item.price.toFixed(2)} 
            <button class="remove-btn" onclick="removeFromCart(${index})">Remove</button>
        `;
        cartItems.appendChild(li);
        total += item.price;
    });

    totalDisplay.textContent = `Total: $${total.toFixed(2)}`;
}

// Update cart count on the index page
function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    
    // If cart-count element doesn't exist, just return
    if (!cartCount) return;

    cartCount.textContent = cart.length;
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
        updateCartCount(); // Make sure cart count is updated after loading the cart
    }
}

// Load the cart when the page loads
document.addEventListener('DOMContentLoaded', function () {
    loadCartFromLocalStorage();
    updateCartCount(); // Update cart count when the page loads
    updateReceipt(); // Update receipt for billing page if necessary
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
