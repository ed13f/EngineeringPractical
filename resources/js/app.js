import './bootstrap';

// Open and close mobile nav dropdown on button click
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
})