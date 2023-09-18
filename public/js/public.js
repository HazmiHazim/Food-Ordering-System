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
*  -------------------- Function for Success Message ---------------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const successMessage = document.querySelector('.success-message');

    if (successMessage) {
        setTimeout(() => {
            successMessage.style.opacity = '0';
            successMessage.remove();
        }, 3000);
    }
});
/*
*  -------------------------- End of Function for Success Message -------------------
*/



/*
*  ------------------------------ Search -------------------------------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const openSearch = document.getElementById('open-search');
    const searchBox = document.querySelector('.search-container');
    const body = document.querySelector('body');

    openSearch.addEventListener('click', (event) => {
        event.stopPropagation();
        searchBox.classList.toggle('active');
    });

    searchBox.addEventListener('click', (event) => {
        event.stopPropagation();
    });

    body.addEventListener('click', () => {
        searchBox.classList.remove('active');
    });

});
/*
*  ------------------------------ End of Search -------------------------------------
*/


/*
*  -------------------------- Function to Click an Icon for Search ---------------------
*/
document.addEventListener('DOMContentLoaded', () => {
    const searchBtn = document.getElementById('search-button');

    searchBtn.addEventListener('click', () => {
        const search = document.getElementById('search-form');
        search.submit();
    });
});
/*
*  ---------------------- End of Function to Click an Icon for Search -----------------------
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
    const addProduct = document.querySelectorAll('.add-to-cart');

    // Initilize an empty cart object
    const cart = JSON.parse(localStorage.getItem('cart')) || {};

    // Get input in add-to-cart
    const tableNumberInput = document.querySelector('input[name="table_number"]');
    const customerContactInput = document.querySelector('input[name="customer_contact"]');
    const confirmOrderBtn = document.querySelector('.confirm-order');

    updateCart();
    updateConfirmButtonState();

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

    // Add product that user click into the cart
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
                    price: foodPrice,
                    quantity: 1
                }
            }

            // Save the updated cart to localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            updateCart();
        });
    });

    // Make confirm button disable if input is not insert
    tableNumberInput.addEventListener('input', () => {
        // Check if the input value is empty
        updateConfirmButtonState();
    });

    // Handle the minus button event
    document.addEventListener('click', (event) => {
        if (event.target.classList.contains('minus')) {
            const foodId = event.target.getAttribute('data-food-id');
            const quantityElement = document.querySelector(`[data-food-id="${foodId}"]`);

            if (cart[foodId] && cart[foodId].quantity > 1) {
                cart[foodId].quantity--;
                quantityElement.textContent = cart[foodId].quantity;

                // Save the updated cart to localStorage
                localStorage.setItem('cart', JSON.stringify(cart));

                updateCart();
            }
        }
    });

    // Handle the plus button event
    document.addEventListener('click', (event) => {
        if (event.target.classList.contains('plus')) {
            const foodId = event.target.getAttribute('data-food-id');

            if (cart[foodId]) {
                cart[foodId].quantity++;

                // Save the updated cart to localStorage
                localStorage.setItem('cart', JSON.stringify(cart));

                updateCart();
            }
        }
    });

    // Handle the listener for delete buttons
    document.addEventListener('click', (event) => {
        if (event.target.classList.contains('bx') || event.target.classList.contains('bxs-trash')) {
            const foodId = event.target.getAttribute('data-food-id');

            if (cart[foodId]) {
                delete cart[foodId];

                // Save the updated cart to localStorage
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCart();

                // Update the confirm button state when an item is deleted
                updateConfirmButtonState();
            }
        }
    });

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

            // Calculate the total price for each of the product based on quantity
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
                    <button type="button" class="minus" data-food-id="${foodId}">-</button>
                    <span>${product.quantity}</span>
                    <button type="button" class="plus" data-food-id="${foodId}">+</button>
                </div>
                <div class="delete">
                    <button type="button" class="cart-list-delete">
                        <i class='bx bxs-trash' data-food-id="${foodId}"></i>
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

        updateConfirmButtonState();
    }

    // Function to update the state of the confirm button
    function updateConfirmButtonState() {
        const tableNumberValue = tableNumberInput.value.trim();
        const isCartEmpty = Object.keys(cart).length === 0;

        // Check if both table number is entered and cart is not empty
        if (tableNumberValue !== '' && !isCartEmpty) {
            confirmOrderBtn.disabled = false;
        } else {
            confirmOrderBtn.disabled = true;
        }
    }

    // Send add-to-cart value to controller
    confirmOrderBtn.addEventListener('click', () => {

        // Initialize an empty array to collect cart data
        const cartData = [];

        // Initialize totalAmount
        let totalAmount = 0;

        // Get the values of table number input and customer contact input
        const table_number = tableNumberInput.value;
        const customer_contact = customerContactInput.value;

        for (const foodId in cart) {
            const product = cart[foodId];

            // Calculate the total price for each product based on quantity
            const eachTotalPrice = product.price * product.quantity;

            // Add the product data to cartData array
            cartData.push({
                id: foodId,
                image: product.image,
                name: product.name,
                price: product.price,
                quantity: product.quantity,
                eachTotalPrice: eachTotalPrice.toFixed(2),
            });

            // Add the eachTotalPrice to the totalAmount
            totalAmount = (parseFloat(totalAmount) + parseFloat(eachTotalPrice)).toFixed(2);
        }

        // Get CSRF token form head tag
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

        console.log('Sending fetch request...');
        console.log('cartData:', cartData);

        // Send an AJAX request to Laravel controller
        fetch('/menu/create-order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ cartData, totalAmount, table_number, customer_contact }),
        })
            .then(response => response.json())
            .then(data => {
                // Handle the response from controller
                console.log(data);

                const successModal = document.querySelector('.modal-success-message');
                const successMessage = document.querySelector('.modal-success-message .message');
                const error = document.getElementById('error-response');


                if (data['success-message']) {

                    // Use success message modal
                    // Set the text content of the modal's success message element
                    successMessage.textContent = data['success-message'];

                    successModal.style.visibility = 'visible';
                    successModal.style.opacity = '1';

                    // Close modal button
                    const closeModalBtn = successModal.querySelector('.close-modal');
                    closeModalBtn.addEventListener('click', () => {
                        successModal.style.visibility = 'hidden';
                        successModal.style.opacity = '0';

                        // Clear and reload page when click button okay
                        localStorage.clear();
                        updateCart();
                        location.reload();
                    });

                } else if (data['validation-error-message']) {
                    error.textContent = data['validation-error-message'];
                    error.classList.remove('success');
                    error.classList.add('error');
                }
            })
            .catch(error => {
                //console.error('Error: ', error);
            });
    });
});
/*
*  -------------------------- End of Add to Cart -----------------------
*/
