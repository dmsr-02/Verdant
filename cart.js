// cart.js
/*let cart = [];

function addToCart(productName, price) {
    const existingItem = cart.find(item => item.name === productName);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name: productName, price: price, quantity: 1 });
    }
    updateCartIcon();
    updateCartSidebar();
    showNotification(`${productName} added to cart!`);
}

function updateCartIcon() {
    const cartCount = document.querySelector('.cart-button .num');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
}

function updateCartSidebar() {
    const cartSidebar = document.querySelector('.cart-food');
    cartSidebar.innerHTML = '';
    let subtotal = 0;

    cart.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('detail');
        itemElement.innerHTML = `
            <div class="text">
                <p>${item.name}</p>
                <p>${item.quantity} x $${item.price.toFixed(2)}</p>
            </div>
            <span class="cross" onclick="removeFromCart('${item.name}')">×</span>
        `;
        cartSidebar.appendChild(itemElement);
        subtotal += item.price * item.quantity;
    });

    const subtotalElement = document.querySelector('.sub-total');
    subtotalElement.innerHTML = `
        SUBTOTAL: <strong>$${subtotal.toFixed(2)}</strong>
        <div class="buttons">
            <a href="cart.html" class="view-cart">view cart</a>
            <a href="cart.html" class="check-out">Check Out</a>
        </div>
    `;
}

function removeFromCart(productName) {
    const index = cart.findIndex(item => item.name === productName);
    if (index !== -1) {
        cart.splice(index, 1);
        updateCartIcon();
        updateCartSidebar();
    }
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.style.position = 'fixed';
    notification.style.bottom = '20px';
    notification.style.right = '20px';
    notification.style.backgroundColor = '#4CAF50';
    notification.style.color = 'white';
    notification.style.padding = '15px';
    notification.style.borderRadius = '5px';
    document.body.appendChild(notification);
    setTimeout(() => {
        document.body.removeChild(notification);
    }, 3000);
}*/

// cart.js
/*let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(productName, price, imageSrc) {
    const existingItem = cart.find(item => item.name === productName);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name: productName, price: price, quantity: 1, image: imageSrc });
    }
    updateCartIcon();
    updateCartSidebar();
    showNotification(`${productName} added to cart!`);
    saveCart();
}

function updateCartIcon() {
    const cartCount = document.querySelector('.cart-button .num');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
}

function updateCartSidebar() {
    const cartSidebar = document.querySelector('.cart-food');
    cartSidebar.innerHTML = '';
    let subtotal = 0;

    cart.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('detail');
        itemElement.innerHTML = `
            <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px; object-fit: cover;">
            <div class="text">
                <p>${item.name}</p>
                <p>${item.quantity} x $${item.price.toFixed(2)}</p>
            </div>
            <span class="cross" onclick="removeFromCart('${item.name}')">×</span>
        `;
        cartSidebar.appendChild(itemElement);
        subtotal += item.price * item.quantity;
    });

    const subtotalElement = document.querySelector('.sub-total');
    subtotalElement.innerHTML = `
        SUBTOTAL: <strong>$${subtotal.toFixed(2)}</strong>
        <div class="buttons">
            <a href="cart.html" class="view-cart">view cart</a>
            <a href="cart.html" class="check-out">Check Out</a>
        </div>
    `;
}

function removeFromCart(productName) {
    const index = cart.findIndex(item => item.name === productName);
    if (index !== -1) {
        cart.splice(index, 1);
        updateCartIcon();
        updateCartSidebar();
        saveCart();
    }
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.style.position = 'fixed';
    notification.style.bottom = '20px';
    notification.style.right = '20px';
    notification.style.backgroundColor = '#4CAF50';
    notification.style.color = 'white';
    notification.style.padding = '15px';
    notification.style.borderRadius = '5px';
    document.body.appendChild(notification);
    setTimeout(() => {
        document.body.removeChild(notification);
    }, 3000);
}

// Initialize cart icon and sidebar on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartIcon();
    updateCartSidebar();
});*/

/*let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(productName, price, imageSrc) {
    const existingItem = cart.find(item => item.name === productName);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name: productName, price: price, quantity: 1, image: imageSrc });
    }
    updateCartIcon();
    updateCartSidebar();
    showNotification(`${productName} added to cart!`);
    saveCart();
}

function updateCartIcon() {
    const cartCount = document.querySelector('.cart-button .num');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
}

function updateCartSidebar() {
    const cartSidebar = document.querySelector('.cart-food');
    cartSidebar.innerHTML = '';
    let subtotal = 0;

    cart.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('cart-item');  // Changed class name for clarity
        itemElement.innerHTML = `
            <div class="cart-item-img">
                <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px; object-fit: cover;">
            </div>
            <div class="cart-item-details">
                <p class="cart-item-name">${item.name}</p>
                <p class="cart-item-quantity">${item.quantity} x $${item.price.toFixed(2)}</p>
            </div>
            <div class="cart-item-remove">
                <span class="cross" onclick="removeFromCart('${item.name}')">×</span>
            </div>
        `;
        cartSidebar.appendChild(itemElement);
        subtotal += item.price * item.quantity;
    });

    const subtotalElement = document.querySelector('.sub-total');
    subtotalElement.innerHTML = `
        SUBTOTAL: <strong>$${subtotal.toFixed(2)}</strong>
        <div class="buttons">
            <a href="cart.html" class="view-cart">View Cart</a>
            <a href="cart.html" class="check-out">Check Out</a>
        </div>
    `;
}

function removeFromCart(productName) {
    const index = cart.findIndex(item => item.name === productName);
    if (index !== -1) {
        cart.splice(index, 1);
        updateCartIcon();
        updateCartSidebar();
        saveCart();
    }
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.style.position = 'fixed';
    notification.style.bottom = '20px';
    notification.style.right = '20px';
    notification.style.backgroundColor = '#4CAF50';
    notification.style.color = 'white';
    notification.style.padding = '15px';
    notification.style.borderRadius = '5px';
    document.body.appendChild(notification);
    setTimeout(() => {
        document.body.removeChild(notification);
    }, 3000);
}

// Initialize cart icon and sidebar on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartIcon();
    updateCartSidebar();
});*/

let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(productName, price, imageSrc) {
    const existingItem = cart.find(item => item.name === productName);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name: productName, price: price, quantity: 1, image: imageSrc });
    }
    updateCartIcon();
    updateCartSidebar();
    showNotification(`${productName} added to cart!`);
    saveCart();
}

function updateCartIcon() {
    const cartCount = document.querySelector('.cart-button .num');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
}

function updateCartSidebar() {
    const cartSidebar = document.querySelector('.cart-food');
    cartSidebar.innerHTML = '';
    let subtotal = 0;

    cart.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('cart-item');  
        itemElement.innerHTML = `
            <div class="cart-item-img">
                <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px; object-fit: cover;">
            </div>
            <div class="cart-item-details">
                <p class="cart-item-name">${item.name}</p>
                <p class="cart-item-quantity">${item.quantity} x $${item.price.toFixed(2)}</p>
            </div>
            <div class="cart-item-remove">
                <span class="cross" onclick="removeFromCart('${item.name}')">×</span>
            </div>
        `;
        cartSidebar.appendChild(itemElement);
        subtotal += item.price * item.quantity;
    });

    const subtotalElement = document.querySelector('.sub-total');
    subtotalElement.innerHTML = `
        SUBTOTAL: <strong>$${subtotal.toFixed(2)}</strong>
        <div class="buttons">
            <a href="cart.html" class="view-cart">View Cart</a>
            <a href="cart.html" class="check-out">Check Out</a>
        </div>
    `;
}

function removeFromCart(productName) {
    const index = cart.findIndex(item => item.name === productName);
    if (index !== -1) {
        cart.splice(index, 1);
        updateCartIcon();
        updateCartSidebar();
        saveCart();
    }
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.style.position = 'fixed';
    notification.style.bottom = '20px';
    notification.style.right = '20px';
    notification.style.backgroundColor = '#4CAF50';
    notification.style.color = 'white';
    notification.style.padding = '15px';
    notification.style.borderRadius = '5px';
    document.body.appendChild(notification);
    setTimeout(() => {
        document.body.removeChild(notification);
    }, 3000);
}

// Initialize cart icon and sidebar on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartIcon();
    updateCartSidebar();
});
