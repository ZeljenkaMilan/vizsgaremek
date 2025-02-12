let cart = [];

// Termék oldalra irányítás kattintáskor
function redirectToProduct(productId) {
    window.location.href = 'product.php?id=' + productId;
}

// Kosárhoz adás
function addToCart(productName, price) {
    cart.push({ name: productName, price: price });
    saveCartToLocalStorage();
    updateReceipt();
    updateCartCount(); // Frissítjük a kosár ikonját
}

// Kosárból eltávolítás
function removeFromCart(index) {
    cart.splice(index, 1);
    saveCartToLocalStorage();
    updateReceipt();
    updateCartCount();
}

// Kosár frissítése a fizetési oldalon
function updateReceipt() {
    const cartItems = document.getElementById('cart-items');
    const totalDisplay = document.getElementById('total');

    if (!cartItems || !totalDisplay) return;

    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach((item, index) => {
        const li = document.createElement('li');
        li.innerHTML = `
            ${item.name} - ${item.price.toFixed(2)} Ft
            <button class="remove-btn" onclick="removeFromCart(${index})">Remove</button>
        `;
        cartItems.appendChild(li);
        total += item.price;
    });

    totalDisplay.textContent = `Total: ${total.toFixed(2)} Ft`;
}

// Kosár ikon frissítése
function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    if (!cartCount) return;
    cartCount.textContent = cart.length;
}

// Kosár mentése
function saveCartToLocalStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Kosár betöltése
function loadCartFromLocalStorage() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
        updateReceipt();
        updateCartCount();
    }
}

// Betöltéskor lefutó kód
document.addEventListener('DOMContentLoaded', function () {
    loadCartFromLocalStorage();
    updateCartCount();
    updateReceipt();
});
