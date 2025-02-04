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








// Show the modal for payment and shipping options
function showModal() {
    const modal = document.getElementById('payment-modal');
    modal.style.display = 'block';
}

// Close the modal
function closeModal() {
    const modal = document.getElementById('payment-modal');
    modal.style.display = 'none';
}

// Handle the confirm purchase action
function confirmPurchase() {
    const paymentMethod = document.getElementById('payment-method').value;
    const shippingMethod = document.getElementById('shipping-method').value;

    hideAllOptionalFields(); // Elrejtjük az opcionális mezőket

    // Ha bankkártyás fizetés és házhoz szállítás van kiválasztva, kérjük az adatokat
    if (paymentMethod === 'card' && shippingMethod === 'home') {
        showAddressFields();
        showCreditCardFields();
    } 
    // Ha készpénzes fizetés és házhoz szállítás van kiválasztva, kérjük csak az adatokat
    else if (paymentMethod === 'cash' && shippingMethod === 'home') {
        showAddressFields();
    } 
    // Ha bankkártyás fizetés és átvétel boltban, csak a bankkártya adatokat kérjük
    else if (paymentMethod === 'card' && shippingMethod === 'pickup') {
        showCreditCardFields();
    } 
    // Ha készpénzes fizetés és átvétel boltban, akkor köszönjük
    else if (paymentMethod === 'cash' && shippingMethod === 'pickup') {
        showThankYouModal();
    }
}

// Show address fields
function showAddressFields() {
    const addressFields = document.getElementById('address-fields');
    addressFields.style.display = 'block';
}

// Show credit card fields
function showCreditCardFields() {
    const creditCardFields = document.getElementById('credit-card-fields');
    creditCardFields.style.display = 'block';
}

// Hide all optional fields
function hideAllOptionalFields() {
    document.getElementById('address-fields').style.display = 'none';
    document.getElementById('credit-card-fields').style.display = 'none';
}

// Show the thank-you modal
function showThankYouModal() {
    const thankYouModal = document.getElementById('thank-you-modal');
    thankYouModal.style.display = 'block';

    cart = []; // Clear the cart after successful purchase
    saveCartToLocalStorage(); // Save the empty cart to localStorage
    updateReceipt(); // Update the receipt to reflect empty cart
}

// Close the thank-you modal
function closeThankYouModal() {
    const thankYouModal = document.getElementById('thank-you-modal');
    thankYouModal.style.display = 'none';
    window.location.href = 'index.php'; // Redirect to the home page
}

// Process the payment for credit card
function processPayment() {
    const cardNumber = document.getElementById('card-number').value;
    const expiryDate = document.getElementById('expiry-date').value;
    const cvv = document.getElementById('cvv').value;

    if (cardNumber && expiryDate && cvv) {
        alert(`Payment processed with card number: ${cardNumber}`);
        closeCreditCardModal();
        showThankYouModal();
    } else {
        alert('Please fill out all the fields.');
    }

// Load the cart when the page loads
document.addEventListener('DOMContentLoaded', loadCartFromLocalStorage);
