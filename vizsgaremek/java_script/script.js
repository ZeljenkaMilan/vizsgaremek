let cart = [];

// Add product to cart
function addToCart(productName, price) {
    cart.push({ name: productName, price: price });
    updateReceipt();
}

// Update receipt on the billing page
function updateReceipt() {
    const cartItems = document.getElementById('cart-items');
    const totalDisplay = document.getElementById('total');

    cartItems.innerHTML = ''; // Clear current items
    let total = 0;

    cart.forEach((item) => {
        const li = document.createElement('li');
        li.textContent = `${item.name} - $${item.price}`;
        cartItems.appendChild(li);
        total += item.price;
    });

    totalDisplay.textContent = `Total: $${total.toFixed(2)}`;
}


