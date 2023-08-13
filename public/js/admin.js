const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');
const menuBar = document.querySelector('.top-bar nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');
const toggler = document.getElementById('theme-toggle');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        });
        li.classList.add('active');
    });
});

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

toggler.addEventListener('change', () => {
    const isChecked = toggler.checked;
    if (isChecked) {
        document.body.classList.add('dark');
    }
    else {
        document.body.classList.remove('dark');
    }
});