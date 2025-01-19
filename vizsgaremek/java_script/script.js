let cart = [];

// Add product to cart
function addToCart(productName, price) {
    cart.push({ name: productName, price: price });
    saveCartToLocalStorage();
    updateReceipt();
}

// Remove product from cart
function removeFromCart(index) {
    cart.splice(index, 1); // Remove the item at the specified index
    saveCartToLocalStorage();
    updateReceipt();
}

// Update receipt on the billing page
function updateReceipt() {
    const cartItems = document.getElementById('cart-items');
    const totalDisplay = document.getElementById('total');

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
    }
}

// Load the cart when the page loads
document.addEventListener('DOMContentLoaded', loadCartFromLocalStorage);
