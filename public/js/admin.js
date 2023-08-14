const menuBar = document.querySelector('.top-bar nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');
const toggler = document.getElementById('theme-toggle');

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