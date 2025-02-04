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



})



 // If the cart is empty
    if (cart.length === 0) {
        cartItems.innerHTML = "<li>Your cart is empty.</li>"; // Show empty cart message
    }


    // Populate the cart items and total
    cart.forEach((item, index) => {
        const li = document.createElement('li');
        li.innerHTML = `
            ${item.name} - $${item.price.toFixed(2)} 
            <button class="remove-btn" onclick="removeFromCart(${index})">Remove</button>
        `;
        cartItems.appendChild(li);
        total += item.price;
    });

    // Update the total price
    totalDisplay.textContent = `Total: $${total.toFixed(2)}`;
}

// Function to remove an item from the cart
function removeFromCart(index) {
    cart.splice(index, 1); // Remove the item at the given index
    localStorage.setItem('cart', JSON.stringify(cart)); // Update localStorage
    updateReceipt(); // Update the receipt view
}



// Function to handle placing the order
function placeOrder() {
    const deliveryOption = document.getElementById('delivery').value;
    const orderDetails = {
        cartItems: cart,
        total: cart.reduce((sum, item) => sum + item.price, 0).toFixed(2),
        delivery: deliveryOption
    };

    console.log('Order Details:', orderDetails);
    // You can send this data to your server or process it further.
    alert(`Your order has been placed! Delivery method: ${deliveryOption}`);
}



// Attach the placeOrder function to the Place Order button
    const placeOrderButton = document.getElementById('place-order-btn');
    if (placeOrderButton) {
        placeOrderButton.addEventListener('click', placeOrder);
    }

    function placeOrder() {
        const deliveryOption = document.getElementById('delivery').value;
        
        const orderDetails = {
            cartItems: cart,
            total: cart.reduce((sum, item) => sum + item.price, 0).toFixed(2),
            delivery: deliveryOption
        };
    
        // Store order details in localStorage
        localStorage.setItem('orderDetails', JSON.stringify(orderDetails));
    
        // Redirect to the payment page
        window.location.href = 'pay.php';
    }
    



;
