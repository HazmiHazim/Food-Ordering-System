const logoutBtn = document.getElementById('logout-button');
const menuBar = document.querySelector('.top-bar nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');
const toggler = document.getElementById('theme-toggle');
const dropdowns = document.querySelectorAll('.dropdown');
const categoryIdInput = document.querySelector('input[name="category_id"]');

// Logout side menu
logoutBtn.addEventListener('click', () => {
    const logout = document.getElementById('logout-form');
    logout.submit();
});

// Close side bar menu
menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sideBar.classList.add('close');
    }
    else {
        sideBar.classList.remove('close');
    }
});

// Dark Mode
toggler.addEventListener('change', () => {
    const isChecked = toggler.checked;
    if (isChecked) {
        document.body.classList.add('dark');
    }
    else {
        document.body.classList.remove('dark');
    }
});

// Dropdown function in create food category
dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select');
    const caret = dropdown.querySelector('.caret');
    const menu = dropdown.querySelector('.menu');
    const options = dropdown.querySelectorAll('.menu li');
    const selected = dropdown.querySelector('.selected');

    select.addEventListener('click', () => {
        select.classList.toggle('select-clicked');
        caret.classList.toggle('caret-rotate');
        menu.classList.toggle('menu-open');
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            const categoryId = option.getAttribute('data-value');
            const categoryName = option.textContent;

            categoryIdInput.value = categoryId;
            selected.textContent = categoryName;
            select.classList.remove('select-clicked');
            caret.classList.remove('caret-rotate');
            menu.classList.remove('menu-open');
        });
    });
});


// Function for success message
document.addEventListener('DOMContentLoaded', () => {
    const successMessage = document.querySelector('.success-message');

    if (successMessage) {
        setTimeout(() => {
            successMessage.style.opacity = '0';
            successMessage.remove();
        }, 3000);
    }
});

// Function for error message
document.addEventListener('DOMContentLoaded', () => {
    const successMessage = document.querySelector('.error-message');

    if (successMessage) {
        setTimeout(() => {
            successMessage.style.opacity = '0';
            successMessage.remove();
        }, 3000);
    }
});


// Function for Delete Confirmation Pop Up
document.addEventListener('DOMContentLoaded', () => {
    const deleteBtn = document.querySelector('.delete-button-popup');
    const confirmationPopup = document.getElementById('deletePopup');
    const closeBtn = document.querySelector('.close-popup');
    const confirmDeleteBtn = document.querySelector('.confirm-delete');
    const deleteForm = document.getElementById('deleteForm');
    const visibility = 'open-popup';

    deleteBtn.addEventListener('click', () => {
        confirmationPopup.classList.add(visibility);
    });

    closeBtn.addEventListener('click', () => {
        confirmationPopup.classList.remove(visibility);
    });

    confirmDeleteBtn.addEventListener('click', () => {
        deleteForm.submit();
    });
});