/*
*  ------------------- Scrolling Top Bar ----------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const topbar = document.querySelector('.topbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 0) {
            topbar.classList.add('scrolled');
        }
        else {
            topbar.classList.remove('scrolled');
        }
    });
});
/*
*  ---------------------- End of Scrolling Top Bar ---------------------
*/




/*
*  ---------------------------- Add to Cart ------------------------------
*/
document.addEventListener('DOMContentLoaded', (event) => {
    const body = document.querySelector('body');
    const cartSection = document.querySelector('.cart-section');
    const openCart = document.querySelector('.cart');
    const closeCart = document.querySelector('.close-cart');
    const cartList = document.querySelector('.cart-list');
    const totalPrice = document.querySelector('.cart-total');
    const addProduct = document.querySelectorAll('.add-to-cart');

    // Initilize an empty cart object
    const cart = {};

    openCart.addEventListener('click', (event) => {
        event.stopPropagation();
        body.classList.add('cart-active');
    });

    closeCart.addEventListener('click', () => {
        body.classList.remove('cart-active');
    });

    // Click outside cart section will close the cart
    body.addEventListener('click', (event) => {
        if (!cartSection.contains(event.target) && !event.target.classList.contains(openCart)) {
            body.classList.remove('cart-active');
        }
    });

    addProduct.forEach(button => {
        button.addEventListener('click', () => {
            const foodId = button.getAttribute('data-food-id');
            const foodImage = button.getAttribute('data-food-image');
            const foodName = button.getAttribute('data-food-name');
            const foodPrice = button.getAttribute('data-food-price');

            if (cart[foodId]) {
                cart[foodId].quantity++;
            }
            else {
                cart[foodId] = {
                    image: foodImage,
                    name: foodName,
                    price: parseFloat(foodPrice),
                    quantity: 1
                }
            }

            updateCart();
        });
    });

    // Handle the "minus" button click
    document.addEventListener('click', (event) => {
        if (event.target.classList.contains('minus')) {
            const foodId = event.getAttribute('data-food-id');
            const quantityElement = document.querySelector(`[data-food-id="${foodId}"]`);

            if (cart[foodId] && cart[foodId].quantity > 1) {
                cart[foodId].quantity--;
                quantityElement.textContent = cart[foodId].quantity;
                updateCart();
            }
        }
    });

    // Handle the "plus" button click

    // Function to update cart view
    function updateCart() {
        // Clear the existing cart list
        cartList.innerHTML = '';

        // Initialize total amount and total item count
        let totalAmount = 0;
        let totalItemCount = 0;

        // Iterate through the cart object and add items to the cart list
        for (const foodId in cart) {
            const product = cart[foodId];

            const listItem = document.createElement('li');

            // Calculate the total price for the product based on quantity
            const productTotalPrice = product.price * product.quantity;

            listItem.innerHTML = `
                <div class="product">
                    <img src="${product.image}" alt="food-image">
                    <span>${product.name}</span>
                </div>
                <div class="quantity-price">
                    <span>${product.quantity}</span>
                    <span>RM ${(productTotalPrice).toFixed(2)}</span>
                </div>
                <div class="action">
                    <button type="button" class="minus">-</button>
                    <span>${product.quantity}</span>
                    <button type="button" class="plus">+</button>
                </div>
                <div class="delete">
                    <button type="button" class="cart-list-delete">
                        <i class='bx bxs-trash' ></i>
                    </button>
                </div>
            `;

            cartList.appendChild(listItem);

            // Calculate the item subtotal and add it to the total amount
            const itemSubtotal = product.price * product.quantity;
            totalAmount = totalAmount + itemSubtotal;

            // Count the item quantity and add it to the total item count
            totalItemCount = totalItemCount + product.quantity;
        }

        // Update the cart total amount and item count in the HTML
        const cartTotalAmountElement = document.getElementById('cart-total-amount');
        cartTotalAmountElement.textContent = `RM ${totalAmount.toFixed(2)}`;

        const cartItemCountElement = document.getElementById('cart-item-count');
        cartItemCountElement.textContent = `Total ${totalItemCount} items`;

        const cartQuantity = document.getElementById('cart-quantity');
        cartQuantity.textContent = totalItemCount;
    }
});
/*
*  -------------------------- End of Add to Cart -----------------------
*/