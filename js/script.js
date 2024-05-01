document.querySelector('.menu-toggle').addEventListener('click', function() {
    document.querySelector('nav ul').classList.toggle('menu-open');
    document.querySelector('header').classList.toggle('menu-open');
});