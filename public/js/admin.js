const menuBar = document.querySelector('.top-bar nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');
const toggler = document.getElementById('theme-toggle');
const dropdowns = document.querySelectorAll('.dropdown');
const categoryIdInput = document.querySelector('input[name="category_id"]');

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